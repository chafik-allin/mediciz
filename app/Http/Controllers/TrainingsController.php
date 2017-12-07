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
        $this->middleware('role:superadmin', ['except'=>['show',"index"]]);
    }

    public function index()
    {
        if(request()->user()->isStudent())
           $trainings = request()->user()->trainings(); 
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
}
