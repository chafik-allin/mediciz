<?php

namespace App\Http\Controllers;
use App\Http\Requests\CoursesRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Training;
use App\Models\Qcm;
use App\Models\Qcm_answer;
use Auth;
use Route;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:superadmin', ['except'=>'show']);
    }

    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index')->withCourses($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->has('formation'))
            $training = Training::slug($request->formation);
        else
            return die("L'url doit contenir ?formation=SLUG-FORMATION"); //redirect()->back();

        return view('courses.create',compact('training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request)
    {
        $request['slug'] = str_slug($request->title);
        $request['user_id'] = Auth::id();

        $training = Training::slug($request->training);
        $course = $training->Courses()->create($request->all());
        
        if($request->has('addqcm'))
            return redirect()->route('qcms.create',['course'=>$course->slug])->withSuccess("Cours ".$course->title." ajouté avec succes! Veuillez ajouter vos QCMs");
        return redirect()->back()->withSuccess("Cours ".$course->title." ajouté avec succes! ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::slug($id);

        return view('courses.show')->withCourse($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::slug($id);
        return view('courses.edit', compact(['course']));
    }

    public function qcms($slug){
        
        $course = Course::slug($slug);
        return view('courses.qcms')->withCourse($course);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesRequest $request, $id)
    {
        $course = Course::slug($id);
        $title = $course->title;
        $course->update($request->all());

        if($request->has('redirect'))
            return redirect($request->redirect)->withSuccess("Cours '".$title."' modifié avec succes! ");

        return redirect()->back()->withSuccess("Cours '".$title."' modifié avec succes! ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        die("destroy $id");
    }
}
