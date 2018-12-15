<?php

namespace App\Http\Controllers;

//use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::find(1);
//        $s1 = Setting::get()->where('id',1);
//        $s1 = Setting::get();
//        dd($s1);
//        $s2 = Setting::where('id',1)->pluck();
//        dd($s2);
        return view('admin.settings.create',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->validate($request,[
            'title' =>'required',
            'description' =>'required',
            'email' =>'email|nullable',
        ]);

        $setting = Setting::find(1);
        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->email = $request->email;

        if ($request->hasFile('logo'))
        {
            $this->validate( request(), [ 'logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048' ]);
            $image = $request->logo;
            $file_name = 'logo-' . time() . '.' . $image->extension();

            if ($image->isValid())
            {
                $target_directory = 'uploads/files';
                $file_path = $target_directory . '/' .$file_name;
                $image->move($target_directory , $file_name);
                $setting->logo = $file_path;
            }
        }

        if (!$setting->save())
        {
            alert()->error('Hata','işlem başarısız')->autoClose('2000');
            return back();
        }
        alert()->success('Başarılı', 'işlem başarılı')->autoClose('2000');
        return back();
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
