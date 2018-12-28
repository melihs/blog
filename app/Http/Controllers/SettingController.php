<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    /**
     * Show the form list  the website settings.
     *
     * @return Response
     */

    public function index()
    {
        $settings = Setting::find(1);
        return view('admin.settings.create',compact('settings'));
    }

    /**
     * @param SettingRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(SettingRequest $request , $id)
    {
        $validated = $request->validated();
        $setting = Setting::find(1);
        $setting->fill($validated);
        $this->logo($setting,'logo');
        $setting->save();
        alert()->success('Başarılı', 'ayarlar güncellendi')->autoClose('2000');
        return back();
    }

    /**
     * @param $setting
     * @param $key
     */

    public function logo( $setting,$key)
    {
        if ( request()->hasFile($key) ) {
            $image = request($key);
            $file_name = "$key-" . time() . '.' . $image->extension();
            $target_directory = 'uploads/files';
            $file_path = $target_directory . '/' . $file_name;
            $image->move($target_directory, $file_name);
            $setting->$key = $file_path;
        }
    }

}
