<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);

        return view('admin.categories.index', compact('categories'));
    } //end of index

    public function create()
    {
        return view('admin.categories.create');
    } //end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];
        } //end of for each

        $request->validate($rules);

        Category::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.categories.index');
    } //end of store

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    } //end of edit

    public function update(Request $request, Category $category)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];
        } //end of for each

        $request->validate($rules);

        $category->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.categories.index');
    } //end of update

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');
    } //end of destroy

}//end of controller
