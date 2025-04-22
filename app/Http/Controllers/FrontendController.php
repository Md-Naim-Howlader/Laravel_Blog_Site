<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\{Category, Post, Subcategory, Inbox};
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
     public function contactStore(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'photo' => 'required',
        ]);
        if($validated) {
            $userInfo = [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ];
            $photo = $request->photo;

            if($photo) {
                $photoName = uniqid() . '.' .$photo->getClientOriginalExtension();
                $image = Image::make($photo);
                $path = storage_path('app/public/uploads/inbox-user/');
                $image->save($path . $photoName);
                $userInfo["photo"] = "storage/uploads/" . $photoName;
            } else {
                $userInfo["image"] = "storage/uploads/inbox-user/empty-user.webp";
            }
            $insert_user = Inbox::create($userInfo);
            if($insert_user) {
                return redirect()->back()->with('success', 'Thank you for contacting us. We’ll get back to you soon.');
            } else {
                return redirect()->back()->with('error', 'Message could not be submitted. Please try again.');
            }
        }
    }

}
