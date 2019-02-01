<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\ImageValidation;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ImageValidation;

    /**
     * @return  admin.users.index
     * @array   users
     */
    public function index()
    {
        $this->authorize('users.admin');
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * @return  admin dashboard
     */
    public function adminIndex()
    {
        return view('admin.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('users.admin');
        return view('admin.users.create');
    }

    /**
     * @param UserRequest $request
     * @return user save
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = new User();
        $user->fill($validated);
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $this->imageValidate($user,'avatar');
        $user->save();
        alert()->success('Başarılı', 'Kullanıcı eklendi')->autoClose('2000');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request , $id)
    {
        try
        {
            $validated = $request->validated();
            $user = User::find($id);
            $user->fill($validated);
            $this->imageValidate($user, 'avatar');
            $user->save();
            alert()->success('Başarılı', 'kullanıcı bilgileri güncellendi')->autoClose('2000');
            return back();
        }catch (\Exception $e)
        {
            alert()->error('Hata', 'bu e-posta daha önce kaydedilmiş !')->autoClose('2000');
            return back();
        }
    }

    /**
     * @param $id
     * @return delete user
     */
    public function destroy($id)
    {
        $this->authorize('users.admin');
        User::destroy($id);
        alert()->success('Başarılı', 'Kullanıcı silindi')->autoClose('2000');
        return redirect()->route('kullanicilar.index');
    }

    /**
     * @return mainpage
     */
    public function userLogout()
    {
        auth()->logout();
        return redirect('/');
    }
}
