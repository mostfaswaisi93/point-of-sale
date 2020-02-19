<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::when($request->search, function($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('admin.categories.index', compact('categories'));

    }//end of index
    
    public function create()
    {
        return view('admin.categories.create');

    }//end of create
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.categories.index');

    }//end of store

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));

    }//end of edit
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);
        
        $category->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.categories.index');
        
    }//end of update
    
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');

    }//end of destroy
    
}//end of controller
