<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    { 
     //  abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');
        return view('admin.users.create',[
            'roles' => $roles,
            'user' => new User(),
        ]);
    }

    public function store(Request $request)
    { 
        //$user = User::create($request->all());
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
        $user->roles()->sync($request->input('roles', []));
        \Session::flash("msg", "s:تم إضافة المستخدم ($user->name) بنجاح");
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
       abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        \Session::flash("msg", "s:تم تعديل المستخدم ($user->name) بنجاح");

        return redirect()->route('users.index');

    }

    public function show(User $user)
    {
      abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        \Session::flash("msg", "w:تم حذف المستخدم ($user->name) بنجاح");
        return back();

    }
}
