<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategory;

class CategoryController extends Controller
{
    /**
     * Show the aplication dashboard to the categories
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::where('up_id',null)->get();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * @param BlogCategory $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategory $request)
    {
        $validated = $request->validated();
        $category = new Category();
        $category->fill($validated);
        $category->slug = str_slug($request->title);
        $category->save();
        alert()->success('Başarılı', 'Kategori eklendi')->autoClose('2000');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
         $all_categories = Category::all();
        return view('admin.categories.edit',compact('category','all_categories'));
    }

    /**
     * @param BlogCategory $request
     * @param $id
     *
     * @return RedirectResponse alert
     */
    public function update(BlogCategory $request, $id)
    {
        $validated = $request->validated();
        $category = Category::find($id);
        $category->fill($validated);
        $category->save();
        alert()->success('Başarılı','Kategori güncellendi')->autoClose('2000');
        return redirect()->route('kategoriler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        alert()->success('Başarılı','Kategori silindi')->autoClose('2000');
        return redirect()->route('kategoriler.index');
    }
}
