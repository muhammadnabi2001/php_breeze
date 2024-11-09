<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        $users=User::orderBy('id','desc')->get();
        $roles=Role::all();
        return view('User.users',['users'=>$users,'roles'=>$roles]);
    }
    public function usercreate()
    {
        $roles=Role::all();
        return view('User.usercreate',['roles'=>$roles]);
    }
    public function store(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:50|min:5|email|unique:users,email',
            'password' => 'required',
            'roles'=>'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->roles()->attach($request->roles);

        return redirect('/users')->with('success', "Ma'lumot muvaffaqiyatli qo'shildi!");

    }
    public function update(Request $request,User $user)
    {
        //dd($request->roles);
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->roles()->sync($request->roles);  
        $user->save();

        return redirect('users')->with('success', 'User updated successfully.');
    }
    public function delete(User $user)
    {
        //dd($id);
        $user->delete();
        return redirect('users')->with('success', 'User deleted successfully.');

    }
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('User.userupdate',['user'=>$user,'roles'=>$roles]);
    }
}
