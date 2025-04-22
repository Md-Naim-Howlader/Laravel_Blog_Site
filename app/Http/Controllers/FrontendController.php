<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Post, Subcategory};
use Illuminate\Support\Facades\Cache;
use DB;

class FrontendController extends Controller
{
    public function index() {
       $posts =  Post::latest()->take(3)->get()->shuffle();;

       return view("frontend.home", compact("posts"));


        // Cache::add("posts", "This is Posts ");
        // Cache::put("posts", $posts, now()->addDay());
        // Cache::forever("posts", "this post title");
        // Cache::forget("posts", "this post title");
        // Cache::flush();
        // Cache::clear();
        // dd(Cache::get("posts"));

    }

    public function getPostById($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()->back();
        }
        return \view("frontend.post", compact("post"));
    }
    public function getCategoryPosts($id) {
        $posts = DB::table("posts")->where("category_id", $id)->get();
        $category = DB::table("categories")->where("id", $id)->first();
        return view("frontend.posts", compact("posts", "category")) ;
    }
    public function search(Request $request) {
         $searchtext = $request->input('searchtext');

        $posts = Post::where('title', 'like', '%' . $searchtext . '%')
                    ->orWhere('tags', 'like', '%' . $searchtext . '%')
                    ->get();

        return view('frontend.search_results', compact('posts', 'searchtext'));
    }
    public function contact() {
        return view("frontend.contact");
    }
    public function allpost() {
        $posts = Post::paginate(3);
        return view("frontend.allpost", compact("posts"));
    }

}
