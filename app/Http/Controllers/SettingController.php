<?php

namespace App\Http\Controllers;

use App\Traits\ImageValidation;
use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    use ImageValidation;

    /**
     * @return settings create page,array settings
     */

    public function index()
    {
        $this->authorize('users.admin');
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
        $this->authorize('users.admin');
        $validated = $request->validated();
        $setting = Setting::find(1);
        $setting->fill($validated);
        $this->imageValidate($setting,'logo');
        $setting->save();
        alert()->success('Başarılı', 'ayarlar güncellendi')->autoClose('2000');
        return back();
    }

}
