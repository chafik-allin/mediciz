<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
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
    public function store(UserRegister $request)
    {
        
        User::Create(['name'=>$request->name, 'email'=>$request->email, 'password'=>bcrypt($request->password)]);
        return redirect()->route('login')->withSuccess('Vous êtes bien enregistré. Veuillez vous connecter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsUser  $modelsUser
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsUser $modelsUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelsUser  $modelsUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsUser $modelsUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelsUser  $modelsUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsUser $modelsUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsUser  $modelsUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsUser $modelsUser)
    {
        //
    }
}
