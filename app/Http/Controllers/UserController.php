<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view("user/index",['users' => $users]);
    }

    public function edit(User $user)
    {
        $roles= Role::all();
        // $user = User::get();
        return view("user.edit", ["user" => $user, "roles" => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('user.index')->with('status', 'Roles Asignados');
    }
}
