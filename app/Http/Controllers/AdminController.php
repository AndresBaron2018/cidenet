<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $role = '';
        $users = User::where('id', '=', auth()->user()->id)->has('roles')->with('roles')->get();
        foreach ($users as $user) {
            foreach ($user->roles as $roles) {
                $role = $roles->name;
            }
        }

        $roles = Role::get();
        $users = User::with('roles')->get();
        return view('admin.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $user = new User([
            'state' => 'active',
        ] + $request->all());
        $user->save();

        $this->updateRole($user, $request->roles);

        return response()->json([
            'user' => $user,
            'saved' => true
        ]);
    }

    public function update(Request $request, User $user)
    {
        $roles = $request->roles;

        $attr = \Arr::except($request, ['role_user', 'roles']);
        if ($request->password == null) {
            $attr = \Arr::except($attr, ['password']);
        }

        $user->update($attr->toArray(), $request->all());
        $this->updateRole($user, $roles);

        return response()->json([
            'user' => $user,
            'saved' => true
        ]);
    }

    public function updateRole(User $user, $roles)
    {
        $user->role_user->each(function ($item) use ($user) {
            $user->removeRole($item);
        });
        if (count($roles) > 0) {
            $user->assignRole($roles);
        }
    }

    public function show($identification_card)
    {
        if (User::where('identification_card', $identification_card)->first()) {
            return 'identification_card already exists';
        } else {
            return 'available';
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('status', 'It was successfully deleted');
    }
}
