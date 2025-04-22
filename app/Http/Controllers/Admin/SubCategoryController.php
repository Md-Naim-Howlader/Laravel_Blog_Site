<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Subcategory};
use Illuminate\Support\Str;
use DB;


class SubCategoryController extends Controller
{
    public function index() {
        // using query builder

        // $subcat = DB::table("subcategories")
        // ->join("categories", "subcategories.category_id", "categories.id")
        // ->select("subcategories.*", "categories.category_name")
        // ->get();

        // using model relationship
        $subcat = Subcategory::all();
        return view("backend.admin.subcategory.index", compact("subcat"));
    }
    public function create() {
        $categories = Category::all();
        return view("backend.admin.subcategory.create", compact("categories"));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

        /*
        // data insert by Model::create() method

        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-')
        ]);
        */
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory Added successfully!');
    }
    public function edit($id) {
        $subcat = Subcategory::find($id);
        $categories = Category::all();
        return view("backend.admin.subcategory.edit", compact("subcat", "categories"));
    }
    public function update(Request $request, $id) {
         $validated = $request->validate([
            'subcategory_name' => 'required|max:255',
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        return redirect()->route("subcategory.index")->with('success', 'Subcategory Updated successfully!');

    }

    public function destroy($id) {
       $subcatobj = Subcategory::destroy($id);
        if (!$subcatobj) {
            return redirect()->back()->with('error', 'Subcategory not found!');
        }
        return redirect()->back()->with('success', 'Subcategory deleted successfully!');
    }
}
