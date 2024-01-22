<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('pages.settings.permissions', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();
        return redirect()->back()->with('status', 'Permission Successfully Saved!');
    }

    public function update(Request $request)
    {
        $permission = Permission::find($request->id);
        $permission->name = $request->name;
        $permission->update();
        return redirect()->back()->with('status', 'Permission Successfully Updated!');
    }
}
