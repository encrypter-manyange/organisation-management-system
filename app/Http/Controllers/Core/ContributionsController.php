<?php

namespace App\Http\Controllers\Core;

use App\Category;
use App\Contribution;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContributionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $contribution = new Contribution;
        $contribution->description = $request->description;
        $contribution->reference = uniqid();
        $contribution->amount = $request->amount;
        $contribution->status = $request->status;
        $contribution->member_id = $request->member_id;
        $contribution->save();
        return redirect()->back()->with('status', 'Contribution Successfully Saved!');
    }

    public function update(Request $request)
    {
        $contribution = Contribution::find($request->id);
        $contribution->status = $request->status;
        $contribution->update();
        return redirect()->back()->with('status', 'Contribution Successfully Updated!');
    }
}
