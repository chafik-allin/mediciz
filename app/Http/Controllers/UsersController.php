<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin');
    }

    public function index()
    {
        $users = User::All();
        return view('users.index')->withUsers($users);
    }

    public function create()
    {
        //
    }

    public function store(UserRegister $request)
    {       

    }
  
    public function show($id)
    {
        $user = User::slug($id);
        return (response()->json($user->toArray()));
    }

    public function edit($id)
    {
        $user = User::slug($id);
        dd("Editer ".$user->name);
    }

    public function update(Request $request,  $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::slug($id);
        $user->delete();
        return redirect()->back()->withSuccess('Utilisateur supprimé avec success');
    }
}
