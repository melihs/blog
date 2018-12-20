<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBlogSetting;
use Illuminate\Http\Request;
use App\Setting;

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
     * @param UpdateBlogSetting $request
     * @param $id
     */
    public function update(UpdateBlogSetting $request , $id)
    {
        $validated = $request->validated();
        $setting = Setting::find(1);
        $setting->fill($validated);
        $this->logo($setting);
        $setting->save();
        alert()->success('Başarılı', 'ayarlar güncellendi')->autoClose('2000');
        return back();
    }

    /**
     * @param $setting
     */
    public function logo( $setting )
    {
        if ( request()->hasFile('logo') ) {
            $image = request('logo');
            $file_name = 'logo-' . time() . '.' . $image->extension();
            $target_directory = 'uploads/files';
            $file_path = $target_directory . '/' . $file_name;
            $image->move($target_directory, $file_name);
            $setting->logo = $file_path;
        }
    }

}
