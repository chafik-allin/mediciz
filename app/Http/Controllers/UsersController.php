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
        $this->middleware('role:superadmin', ['except'=>["index"]]);
        $this->middleware('role:admin');
    }

    public function index()
    {
        if(request()->user()->isSuperAdmin())
            $users = User::All();
        else
            $users = User::where('company_id', request()->user()->company_id)->get();
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
        //Vérifie si l'utilisateur est du même entreprise que l'admin avant de supprimer
        if(Auth::user()->isSuperAdmin() || ($user->company_id == Auth::user()->company_id))
        {
            $user->delete();
            return redirect()->back()->withSuccess('Utilisateur supprimé avec success');
        }

        return redirect()->back();
    }
}
