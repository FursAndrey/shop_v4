<?php

namespace App\Http\Controllers\Admin;

use App\Actions\UserActions\DeleteUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles'])->paginate(15);
        return view('shop.admin.user.index', compact('users'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('shop.admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('shop.admin.user.edit', compact('user', 'roles'));
    }

    public function update(RoleUserRequest $request, User $user)
    {
        $user->fill($request->validated())->save();
        $user->roles()->sync($request->role_id);
        return redirect()->route('user.index')->with('success','User role Has Been updated successfully');
    }
    
    public function destroy(User $user)
    {
        (new DeleteUserAction)($user);
        return redirect()->route('user.index');
    }
}
