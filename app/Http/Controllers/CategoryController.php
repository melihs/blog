<?php

namespace App\Http\Controllers;

use App\Category;
use function Sodium\compare;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'up_id' => 'integer|nullable',
            'title' => 'string|required',
            'description' => 'string|required'
        ]);

        $category = new  Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = str_slug($request->title);
        $category->up_id = $request->up_id;

        if (!$category->save())
        {
            alert()->error('Hata','işlem başarısız')->autoClose('2000');
            return back();
        }
        alert()->success('Başarılı', 'Kategori eklendi')->autoClose('2000');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'up_id' => 'integer|nullable',
            'title' => 'string|required',
            'description' => 'string|required'
        ]);

        $category = Category::find($id);
        $category->up_id = $request->up_id;
        $category->title = $request->title;
        $category->description = $request->description;

        if(!$category->save())
        {
            alert()->error('Hata','işlem başarısız')->autoClose('2000');
            return back();
        }
        alert()->success('Başarılı','Kategori güncellendi')->autoClose('2000');
        return redirect()->route('kategoriler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
