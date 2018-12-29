<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    /**
     * @return settings create page,array settings
     */

    public function index()
    {
        $settings = Setting::find(1);
        return view('admin.settings.create',compact('settings'));
    }

    /**
     * @param SettingRequest $request
     * @param $id
     * @return update settings
     */

    public function update(SettingRequest $request , $id)
    {
        $validated = $request->validated();
        $setting = Setting::find(1);
        $setting->fill($validated);
        $this->imageValid($setting,'logo');
        $setting->save();
        alert()->success('Başarılı', 'ayarlar güncellendi')->autoClose('2000');
        return back();
    }

    /**
     * @param $setting
     * @param $key
     */

    public function imageValid( $setting,$key)
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
