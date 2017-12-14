<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminsController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("admins.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ConfirmTrainingCompany($training, $company, $notification)
    {
        \DB::table('training_company')->update(['is_confirmed'=>true]);
        \DB::table('user_notification')
        ->where([
                    ['user_id','=', \Auth::user()->id],
                    ['notification_id','=',$notification]
                ])
        ->update(['is_viewed'=>true]);
        session()->flash('success', "La formation a été attaché correctement à l'entreprise");
        return view('admins.confirmtrainingcompany');
    }
}
