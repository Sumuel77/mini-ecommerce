<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private static $user;
    public function addUser()
    {
        return view('admin.user.add-user');
    }
    public function saveUser(Request $request)
    {
        User::saveUser($request);
        return back()->with('message', 'info save successfully');
    }
    public function manageUser()
    {
        return view('admin.user.manage-user',[
          'users' => User::all()
        ]);
    }
    public function editUser($id)
    {
        return view('admin.user.edit-user',[
            'user' => User::find($id)
        ]);
    }
    public function updateUser(Request $request)
    {
      User::updateUser($request);
      return redirect(route('user.manage'))->with('message','info update successfully');
    }
    public function deleteUser(Request $request)
    {
        self::$user = User::find($request->id);
        self::$user->delete();
        return back()->with('message', 'info delete successfully');
    }
}
