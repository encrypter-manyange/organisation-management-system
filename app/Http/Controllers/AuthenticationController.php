<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //this method adds new users
    public function createAccount(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);
        return \Illuminate\Support\Facades\Response::json([
            'data' => $user->createToken('tokens')->plainTextToken

        ]);
    }
    //use this method to signin users
    public function signin(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return \Illuminate\Support\Facades\Response::json(["data"=>'Credentials not match'], 403);
        }
        return \Illuminate\Support\Facades\Response::json([
            "data"=>[
                'token' => auth()->user()->createToken('API Token')->plainTextToken
            ]
        ], 200);

    }

    // this method signs out users by removing tokens
    public function signout()
    {
        auth()->user()->tokens()->delete();

        return [
            ["data"=>[
                'token' => 'Tokens Revoked'
            ]
            ]

        ];
    }

    public function store_api(Request  $request){

        $checker = Member::where("email",$request->email)->get();
        if (count($checker)>0){
            return \Illuminate\Support\Facades\Response::json([
                "data"=>"Email ".$request->email." already exists!"
            ], 403);
        }

        $member = new Member();
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->last_name = $request->last_name;
        $member->id_number = $request->id_number;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $member->marital_status = $request->marital_status;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->save();
        return \Illuminate\Support\Facades\Response::json([
            "data"=>$member
        ], 200);

    }
    public function login_member(Request  $request){

        $email = $request->email;
        $user = Member::where("email",$email)->get();
        if (count($user)<0){
            return \Illuminate\Support\Facades\Response::json([
                "data"=>$user[0]
            ], 403);
        }
        return \Illuminate\Support\Facades\Response::json(
            ["data"=>$user[0]]
            , 200);
    }

    // this method returns all sermons
    public function contributions($member_id) {
        $data = \App\Contribution::where('member_id',$member_id)->where('status',1)->get();
        return \Illuminate\Support\Facades\Response::json([
            "data"=>$data
            ], 200);
    }
}
