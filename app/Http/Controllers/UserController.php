<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{

    public function index() {
        $users = User::all();
        return view("backend.users.index", compact("users"));
    }
    public function destroy($id) {
          $user = User::find($id);
          $del_info = $user->delete();
          if($del_info) {
            return redirect()->back()->with('success', 'User Deleted Successfully!');
          } else {
            return redirect()->back()->with('error', 'User not Deleted !');
          }
    }
}
