<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/User/Index',[
            'users' => User::where('id','!=',1)->get()
        ]);
    }

    public function newUser()
    {
        return Inertia::render('Admin/User/Create',[
            'permissions' => Permission::all()
        ]);
    }

    public function store(NewUserRequest $request)
    {
    
        $data = $request->except('_token','permissions');
        
        $user = User::create($data);

        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('Admin/User/Edit',[
            'user' => $user,
            'permissions' => Permission::all(),
            'userPermissions' => $user->permissions->pluck('id')
        ]);
    }

    public function update(Request $request,User $user)
    {
        $data = $request->except('_token','permissions');

        $user->update($data);

        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->syncPermissions([]);
       
        $user->delete();

        return redirect()->route('users.index');
    }
}
