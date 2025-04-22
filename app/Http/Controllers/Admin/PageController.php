<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.admin.page.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pages|max:255',
            'content' => 'required',
        ]);
        $pageInsert = Page::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content
        ]);
        if($pageInsert) {
            return redirect()->back()->with('success', 'Page created Successfully!');
        } else {
            return redirect()->back()->with('error', 'Page not created!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = Page::find($id);
        return view("frontend.page", compact("page"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::find($id);
        return view("backend.admin.page.edit", compact("page"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
        ]);
        $pageUpdate = Page::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content
        ]);
         if($pageUpdate) {
            return redirect()->back()->with('success', 'Page updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Page not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::find($id);
        $pageDelete = $page->delete();
        if($pageDelete) {
            return redirect()->route("dashboard")->with('success', 'Page deleted Successfully!');
        } else {
            return redirect()->route("dashboard")->with('error', 'Page not deleted!');
        }
    }
}
