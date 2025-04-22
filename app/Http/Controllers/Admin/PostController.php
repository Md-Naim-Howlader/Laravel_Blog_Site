<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Post, Subcategory};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{DB, Auth, File, Storage};
use Intervention\Image\Facades\Image;
use App\Events\PostProcessed;
use Illuminate\Support\Facades\Cache;
class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::all();
        $posts = DB::table("posts")
            ->join("categories", "posts.category_id", "categories.id")
            ->join("subcategories", "posts.subcategory_id", "subcategories.id")
            ->join("users", "posts.user_id", "users.id")
            ->select("posts.*", "categories.category_name", "subcategories.subcategory_name", "users.name")
            ->get();

        return view("backend.admin.post.index", compact("posts"));

    }
    public function create()
    {
        $allCategory = Category::all();

        return view("backend.admin.post.create", compact("allCategory"));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'post_date' => 'required',
            'tags' => 'required',

        ]);
        $catId = DB::table("subcategories")->where("id", $request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug("-");
        $data = [
            "category_id" => $catId,
            "subcategory_id" => $request->subcategory_id,
            "user_id" => Auth::id(),
            "title" => $request->title,
            "slug" => $slug,
            "author" => $request->author,
            "description" => $request->description,
            "post_date" => $request->post_date,
            "tags" => $request->tags,
            "status" => $request->status,

        ];


        //__ Event Calling PostProcessed start __//
        // $event_data = [
        //     "title" => $request->title,
        //     "author" => Auth::user()->name,
        //     "date" => date("d F Y", strtotime($request->post_date))
        // ];

        // event(new PostProcessed($event_data));
        //__ Event Calling PostProcessed start __//

        $photo = $request->image;

        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension(); // 334354.png(jpg, png, svg or others image format)

            $image = Image::make($photo)->resize(600, 400); // resize image

            $path = storage_path('app/public/uploads/'); // storage path jekhane store korbo

            $image->save($path . $photoName); // save for uploads folder
            $data["image"] = "storage/uploads/" . $photoName; // amer $data arrary er vitor 'image' namok new element add korlam
            Post::create($data); // finally data database e store korlam
            return redirect()->back()->with('success', 'Post Inserted Successfully!');
        } else {

            $data["image"] = "storage/uploads/no-image.jpg"; // jodi empty email hoy
            Post::create($data);
            return redirect()->back()->with('success', 'Post Inserted Successfully!');
        }
    }
    public function edit($id)
    {
        $allCategory = Category::all();
        $post = Post::find($id);
        return view("backend.admin.post.edit", compact("allCategory", "post"));
    }
    public function update(Request $request, $id)
{
    $post = Post::find($id);

    if ($post) {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'post_date' => 'required',
            'tags' => 'required',
        ]);

        $catId = DB::table("subcategories")->where("id", $request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug("-");

        // set data
        $post->subcategory_id = $request->subcategory_id;
        $post->category_id = $catId;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->author = Auth::user()->name;
        $post->description = $request->description;
        $post->post_date = $request->post_date;
        $post->tags = $request->tags;
        $post->status = $request->status;

        $photo = $request->image;

        if ($photo) {

            $oldImagePath = public_path($post->image); // full path
            if (File::exists($oldImagePath)) {
                if (File::basename($post->image) != "no-image.jpg") {
                    File::delete($oldImagePath);
                }
            }


            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            $image = Image::make($photo)->resize(600, 400);

            $path = storage_path('app/public/uploads/');
            $image->save($path . $photoName);

            $post->image = "storage/uploads/" . $photoName;
        }

        $post->save();
        return redirect()->route("post.index")->with('success', 'Post Updated Successfully!');
    }

    return redirect()->back()->with('error', 'Post Not Found!');
}

public function destroy($id){
    $post = Post::find($id);

    if ($post) {
        $imagePath = public_path($post->image);

        if (File::exists($imagePath)) {
            if (File::basename($post->image) != "no-image.jpg") {
                File::delete($imagePath);
            }
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post Deleted Successfully!');
    }

    return redirect()->back()->with('error', 'Post Not Found!');
}

}
