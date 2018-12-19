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
        if(!$setting->save())
        {
            return back();
        }
        alert()->success('Başarılı', 'işlem başarılı')->autoClose('2000');
        return back();
    }

}
