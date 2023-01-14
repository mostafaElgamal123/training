<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        return view("admin.pages.categories.index",[
            'category'=>Category::all()
        ]);
    }

    public function create(){
        return view("admin.pages.categories.create");
    }

    public function store(Request $request){
        $request->validate([
            'name'=>"required|min:3|max:150",
            "description"=>"required|min:3|max:100000",
        ]);
        Category::create($request->all());
        return redirect("/categories/create")->with("success","added");
    }

    public function edit(Category $category){
        return view("admin.pages.categories.edit",[
            'category'=>$category,
        ]);
    }

    public function update(Request $request,Category $category){
        $request->validate([
            'name'=>"required|min:3|max:150",
            "description"=>"required|min:3|max:100000",
        ]);
        $category->update($request->all());
        return redirect("/categories/$category->id/edit")->with("success","updated");
    }

    public function destory(Category $category){
         $category->delete();
         return redirect("categories")->with("success","deleted");
    }
}
