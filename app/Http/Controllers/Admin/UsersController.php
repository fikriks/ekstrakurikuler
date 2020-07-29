<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $total = User::count();
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->paginate(10);
        $users->appends(['search' => $search]);
        return view('admin.users.index', compact('users', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $role = Role::get();
        return view('admin.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $request->validate([
            'name' => 'required|string|min:3',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:7',
            'role' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'avatar' => "avatar-1.png"
        ]);

        $role = Role::findOrFail($request->role);
        if ($role) {
            $user->assignRole($role);
        }

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::get();

        return view('admin.users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', User::class);

        $user = User::findOrFail($id);

        $user->update($request->only([
            'name', 'username'
        ]));

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        if ($request->role && $request->user()->can('edit')) {
            $role = Role::find($request->role);
            if ($role) {
                $user->syncRoles([$role]);
            }
        }

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);

        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }
}
