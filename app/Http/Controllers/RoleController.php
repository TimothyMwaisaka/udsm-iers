<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\User_role;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    public function getRoles()
    {
        $users = User::all();
        $roles = Role::all();
        return View('assign_roles', compact('roles', 'users'));
    }

    public function assignRoles(Request $req)
    {
        $this->validate($req, array(
            'role_id' => 'required|max:255',
            'user_id' => 'required|max:255|unique:user_role'
        ));
        $role = new User_role();
        $role->role_id = $req->role_id;
        $role->user_id = $req->user_id;
        $role->save();
        return back()->with('message', 'Role assigned successfully!');
    }
}
