<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Category;
use App\Http\Requests\TrainingRequest;
use App\Models\Tag;

class TrainingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', ['only'=>"attachUsers", "storeUserTraining"]);
        $this->middleware('role:superadmin', ['except'=>['attachUsers', 'storeUserTraining', 'show',"index", "subscribe"]]);
    }

    public function index(Request $request)
    {
        if(request()->user()->isStudent())
           $trainings = request()->user()->Trainings; 
        elseif($request->has('filter') && ($request->filter=="own"))  // Company
            if($company = request()->user()->company)
                $trainings = $company->getAllTrainings;
            else
                return redirect()->route('trainings.index');
        else
            $trainings = Training::All();
       return view('trainings.index')->withTrainings($trainings);
    }

    public function create()
    {
        $categories = Category::All();
        if($categories->count()==0)
            return "Veuillez créer des categories d'abord <a href=\"".route('categories.create')."\"> Cliquer ici</a>";
        return view('trainings.create')->withCategories($categories);
    }

    public function store(TrainingRequest $request)
    {
        $request['slug'] = str_slug($request->title);
        $training = $request->user()->publishedTrainings()->create($request->all());

        if($request->has('tags'))
        {
            $tags = explode(',',$request->tags);
            foreach($tags as $tag)
                Tag::firstOrcreate(['taggable_id'=>$training->id, 'taggable_type'=>get_class($training), "name"=>$tag]);            
        }


        if($request->has('addCourses'))
            return redirect()->route('courses.create',['formation'=>$training]);
        return redirect()->back()->withSuccess('Formation Créé avec succes');
    }

    public function show($id)
    {
        $training = Training::slug($id);

        return view('trainings.show')->withTraining($training);
    }

    public function courses($id){
        $training = Training::slug($id);
        return view('trainings.courses')->withTraining($training);
    }

    public function edit($id)
    {
        $training = Training::Slug($id);
        $categories = Category::all();
        return view('trainings.edit')->withTraining($training)->withCategories($categories);
    }

    public function update(TrainingRequest $request, $id)
    {
        $training = Training::slug($id);
        $training->update($request->all());
        $training->tags()->delete();
        
        if($request->has('tags'))
        {
            $tags = explode(',',$request->tags);
            foreach($tags as $tag)
                if($tag!='')
                    Tag::firstOrcreate(['taggable_id'=>$training->id, 'taggable_type'=>get_class($training), "name"=>$tag]);            
        }
        return redirect()->back()->withSuccess('Formation Créé avec succes');        
    }

    public function destroy($id)
    {
        $training = Training::slug($id);
        $training->tags()->delete();
        $training->delete();
        return redirect()->back()->withSuccess('Formation supprimée avec succes');
    }

    public function confirmSub($training, $company, $notification)
    {
        \DB::table('training_company')->update(['is_confirmed'=>true]);
        \DB::table('user_notification')
        ->where([
                    ['user_id','=', \Auth::user()->id],
                    ['notification_id','=',$notification]
                ])
        ->update(['is_viewed'=>true]);
        session()->flash('success', "La formation a été attaché correctement à l'entreprise");
        return view('trainings.attach_to_company');
    }

    public function attachToCompany(Request $request)
    {
        $this->validate($request,
            [
                'companies'=>'required',
                'training'=>'required|exists:trainings,id'
            ]);
        $training = Training::find($request->training);
        $training->companies()->detach();
        //        foreach($companies as $company)
            $training->companies()->attach($request->companies);
    }

    public function attachUsers($slug)
    {
        $training   =   Training::slug($slug);
        
        if(\Auth::user()->isSuperAdmin())
            $users = \App\User::All();
        elseif(\Auth::user()->isAdmin())
            if($company = \Auth::user()->company)
                $users = $company->users;

        return view('trainings.attach_to_users')->withTraining($training)->withUsers($users);
    }

    public function storeUserTraining(Request $request)
    {
        $this->validate($request,
        [
            'training'  =>  'required|exists:trainings,id',
            'user'      =>  'required|exists:users,id',
            'action'    =>  'required'
        ]);

        //Vérfier si l'admin a vraiment cette formation, et l'utilisateur appartient vraiment à son entreprise
        if( request()->user()->isAdmin() && request()->user()->company->hasTraining($request->training) )
        {
            $user = \App\User::find($request->user);
            if($user && (request()->user()->company == $user->company))
                if($request->action == "add")
                {
                    $user->trainings()->attach($request->training);
                    return response()->json(['success'=>'Utilisateur '.$user->name.' est attaché à la formation  avec success']);
                }
                elseif($request->action == "del")
                {
                    $user->trainings()->detach($request->training);
                    return response()->json(['warning'=>'Utilisateur '.$user->name.' a été détaché de la formation  avec success']);
                }
        }
        return response()->json(['error'=>'Pas autorisé'],403);
    }

    public function subscribe(Request $request)
    {
        
        $this->validate($request,
        [
            'training'=>'required|exists:trainings,slug'
        ]);

        $training = Training::slug($request->training);
        $company = \Auth::user()->Company;
        
        $training_company = $training->companies()->where('id',$company->id)->first();
        if($training_company == null)
        {
            $training->Companies()->attach($company->id);
            
            $notificationBody = $company->name." Demande la formation ".$training->title;
            $href = "/confirm/training/".$training->id."/company/".$company->id;
            $icon = "fa fa-building";
            //send notification to all superadmins
            foreach(\App\Models\Role::superAdmins() as $superAdmin)
                $superAdmin->notify(new \App\Notifications\NewSubscriber($superAdmin, $notificationBody,$href, $icon));
        }        

        return redirect()->back();
    }
}
