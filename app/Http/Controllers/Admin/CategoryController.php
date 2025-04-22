<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view("backend.admin.category.index", compact("categories"));
    }
    public function create() {
        return view("backend.admin.category.create");
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::of($request->category_name)->slug('-');
        $category->save();
        return redirect()->back()->with('success', 'Category Added successfully!');
    }
    public function edit($id) {
        $category = Category::find($id);
        if(!$category){
             return redirect()->back()->with('error', 'Category Not Found!');
        }else {
            return view("backend.admin.category.edit", compact('category'));
        }
    }
    public function update(Request $request, $id) {
         $validated = $request->validate([
            'category_name' => 'required|max:255'
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::of($request->category_name)->slug('-');
        $category->save();
         return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
    }
    public function destroy($id) {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }

        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
