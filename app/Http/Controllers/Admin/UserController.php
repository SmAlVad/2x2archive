<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(10);

        return view('admin.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'roles'         => ['required']
        ]);

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        $user->assignRole($request->input('roles'));

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Новый пользователь успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user       = User::find($id);

        $roles      = Role::pluck('name','name')->all();
        $userRole   = $user->roles->pluck('name','name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validator = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id)],
            'password'  => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $request->get('password') == null ?: $user->password = bcrypt($request->get('password'));
        $user->save();

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Данные пользователя успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Пользователь успешно удален');
    }
}
