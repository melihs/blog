<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('users.common');
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('users.common');
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
        $page->slug = Str::slug($request->title);
        $page->save();
        return Response()->json(['success'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('users.common');
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
        $page = Page::find($id);
        $page->fill($validated);
        $page->slug = Str::slug($request->title);
        $page->save();
        return Response()->json(['success'=>$page]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('users.common');
        Page::destroy($id);
        alert()->success('Başarılı', 'Sayfa silindi')->autoClose('2000');
        return redirect()->route('sayfalar.index');
    }
}
