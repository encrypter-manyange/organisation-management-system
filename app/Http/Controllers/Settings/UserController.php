<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = \App\User::where("id", "<>", 13)->get();
        $roles = \App\Role::all();
        return view('pages.settings.users', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request)
    {
        $user = \App\User::find($request->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->status = $request->status;
        if($request->password!="" or isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->update();
        return redirect()->back()->with('status', 'User Details Successfully Updated!');
    }

    public function store(Request $request)
    {
        $user = new \App\User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->back()->with('status', 'User Details Successfully Stored!');

    }
}
