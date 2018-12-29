<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @return  admin index
     */

    public function index()
    {
        return view('admin.index');
    }

    /**
     * @return  user create
     */

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param UserRequest $request
     *
     * @return user save
     */

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = new User();
        $user->fill($validated);
        $user->password = Hash::make($request->password);
        $user->save();
        alert()->success('Başarılı', 'Kullanıcı eklendi')->autoClose('2000');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
