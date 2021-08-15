<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Employe;
use Illuminate\Support\Facades\Hash;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    { 
       abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'employe' => new Employe(),
        ]);
    }

    public function store(StoreUserRequest $request)
    { 
       
        $user->roles()->sync($request->input('roles', []));
        \Session::flash("msg", "s:تم إضافة المستخدم ($user->name) بنجاح");
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
       //abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        \Session::flash("msg", "تم تعديل المستخدم بنجاح");

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
        session()->flash("msg", "w: تم الحذف بنجاح");
        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
