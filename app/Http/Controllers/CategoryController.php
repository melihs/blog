<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @return  category index view, array categories
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
        $this->authorize('users.common');
        $categories = Category::where('up_id',null)->get();
        return view('admin.categories.create',compact('categories'));

    }

    /**
     * @param CategoryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = new Category();
        $category->fill($validated);
        $category->slug =Str::slug($request->title);
        $category->save();
        return Response()->json(['success'=>$category]);
    }

    /**
     * @param  \App\Category  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $this->authorize('users.common');
        $category = Category::find($id);
        $all_categories = Category::all();
        return view('admin.categories.edit',compact('category','all_categories'));
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     *
     * @return RedirectResponse alert
     */

    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = Category::find($id);
        $category->fill($validated);
        $category->slug = Str::slug($request->title);
        $category->save();
        return Response()->json(['success'=>$category]);
    }

    public function show(  )
    {
     return redirect()->route('admin.index');
    }
    
    /**
     * @param  \App\Category  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('users.common');
        Category::destroy($id);
        alert()->success('Başarılı','Kategori silindi')->autoClose('2000');
        return redirect()->route('kategoriler.index');
    }
}
