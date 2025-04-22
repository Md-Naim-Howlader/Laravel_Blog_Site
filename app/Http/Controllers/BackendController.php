<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class BackendController extends Controller
{
    public function showThemes() {
        $theme = DB::table("themes")->where("id", 1)->first();
        return view("backend.themes", compact("theme"));
    }
    public function updateTheme(Request $request) {

        $data = [
            "theme_name" => $request->theme_name,
            'updated_at' => now()
        ];

          $update_info = DB::table("themes")
        ->where("id", 1)
        ->update($data);
        if($update_info) {
            return redirect()->back()->with('success', 'Theme Changes successfully!');
        }else {
            return redirect()->back()->with('error', 'Theme Not Changes!');
        }
    }
}
