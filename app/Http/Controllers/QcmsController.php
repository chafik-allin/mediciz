<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Qcm;
use App\Http\Requests\QcmRequest;
class QcmsController extends Controller
{



    public function __construct()
    {
        $this->middleware('role:suepradmin');
    }

    public function index()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->validate(request(),['course'=>'required']);
        return view('qcms.create')->withCourse(Course::slug(request()->course));
    }

    public function store(QcmRequest $request)
    {   

         $course = Course::slug($request->course);
        $qcm = $course->qcms()->create(['question'=>$request->question]);
        foreach($request->responses as $response)
        {
            if(empty($response['content']))
                continue;
            $qcm->answers()->create(['content'=>$response['content'], 'is_correct'=>array_key_exists('is_correct',$response)]);
        }
        if($request->has('addqcm'))
            return redirect()->back()->withSuccess('QCM Ajouté avec success');

        return redirect()->route('courses.show', ['slug'=>$request->course])->withSuccess('QCM ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qcm = Qcm::findOrFail($id);
        return view('qcms.edit')->withQcm($qcm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required', 
            'responses'  =>'required'
        ]);

        $qcm = Qcm::findOrFail($id);
        $qcm->answers()->delete();
        $qcm->update(['question'=>$request->question]);
        foreach($request->responses as $response)
        {
            if(empty($response['content']))
                continue;
            $qcm->answers()->create(['content'=>$response['content'], 'is_correct'=>array_key_exists('is_correct',$response)]);
        }
        return redirect()->back()->withSuccess('QCM modifié avec success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qcm = Qcm::findOrFail($id);
        $qcm->delete();
        return redirect()->back()->withSuccess('QCM Supprimé avec success');
    }
}
