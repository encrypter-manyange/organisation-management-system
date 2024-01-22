<?php

namespace App\Http\Controllers\Core;

use App\Contribution;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = Member::all();
        return view('pages.system.members', [
            'members' => $members,

        ]);
    }
    public function show($member_id)
    {
        $member = Member::find($member_id);
        $contributions = Contribution::where("member_id",$member_id)->get();
        return view('pages.system.contributions', [
            'contributions' => $contributions,
            'member' => $member,

        ]);
    }

    public function store(Request $request)
    {
        $member = new Member;
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->last_name = $request->last_name;
        $member->id_number = $request->id_number;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $member->marital_status = $request->marital_status;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->save();
        return redirect()->back()->with('status', 'Member Details Successfully Saved!');
    }

    public function update(Request $request)
    {
        $member =  Member::find($request->id);
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->last_name = $request->last_name;
        $member->id_number = $request->id_number;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $member->marital_status = $request->marital_status;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->update();
        return redirect()->back()->with('status', 'Member Details Successfully Updated!');
    }
}
