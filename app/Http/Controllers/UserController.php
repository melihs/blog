<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\Image;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Image;

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
        $this->setImagePath($user,'avatar');
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
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id)
    {
        $user = User::find($id);
        $this->validate(request(),
            [
                'role_id' => 'required',
                'name'   => 'required|string|max:255',
                'avatar' => 'image|mimes:png,jpg,jpeg,gif,gif|max:2048|nullable'
            ],
            [
                'name.required' =>'isim alanı boş bırakılamaz !',
                'avatar.image' => 'Sadece resim dosyaları kaydedilir !',
                'avatar.mimes' => ' Dosya formatı geçerli değil.Desteklenen formatlar jpg,jpeg,png,gif !',
                'avatar.max' => 'Dosya boyutu maksimum 2mb olmalı !'
            ]);
        $user->role_id = request('role_id');
        $user->name = request('name');
        $this->emailValidate($user,$id);
        $this->passwordValidate($user);
        $this->setImagePath($user, 'avatar');
        $user->save();
        alert()->success('Başarılı', 'kullanıcı bilgileri güncellendi')->autoClose('2000');
        return back();
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

    /**
     * @param $user
     * @param $id
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function emailValidate($user, $id)
    {
        $getEmail = User::find($id)->email;
        if($getEmail !== request()->email || request()->email === null)
        {
            $this->validate(request(),
                [
                    'email' => 'required|string|email|max:255|unique:users'
                ],
                [
                    'email.required' => 'e-posta alanı boş bırakılamaz !',
                    'email.unique' =>'bu e-posta daha önce kaydedilmiş !',
                    'email.email' =>'Lütfen e-posta girişi yapın ör: example@gmail.com',
                ]
            );
            $user->email = request()->email;
            return  $user->email;
        }
    }

    /**
     * @param $user
     *
     * @return string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function passwordValidate($user)
    {
        if(request()->password)
        {
            $this->validate(request(),
                [
                    'password' =>'required|string|min:6|confirmed'
                ],
                [
                    'password.required' =>'parola alanı boş bırakılamaz !',
                    'password.min' =>'parola en az 6 karakterden oluşmalı !',
                    'password.confirmed' =>'parolalar eşleşmedi !',
                ]
            );
            $user->password = Hash::make(request()->password);
            return $user->password;
        }
    }
}
