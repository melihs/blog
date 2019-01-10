<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return page index view
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * @return pages create view
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * @param PageRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PageRequest $request)
    {
        $validated = $request->validated();
        $page = new Page();
        $page->fill($validated);
        $page->slug = str_slug($request->title);
        $page->save();
        alert()->success('Başarılı', 'Sayfa kaydedildi')->autoClose('2000');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * @param PageRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageRequest $request,$id)
    {
        $validated = $request->validated();
        Page::find($id)->update($validated);
        alert()->success('Başarılı', 'Sayfa güncellendi')->autoClose('2000');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);
        alert()->success('Başarılı', 'Sayfa silindi')->autoClose('2000');
        return redirect()->route('sayfalar.index');
    }
}
