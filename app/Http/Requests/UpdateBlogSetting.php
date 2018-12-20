<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogSetting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the update.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>'required',
            'description' =>'required',
            'email' =>'email',
            'logo' =>'image|mimes:png,jpg,jpeg,gif,gif|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'başlık alanı boş bırakılamaz !',
            'description.required'  => 'açıklama alanı boş bırakılamaz !',
            'email.email'  => 'email alanı formatı example@gmail.com şeklinde olmalı !',
            'logo.image' => 'Sadece resim dosyaları kaydedilir !',
            'logo.mimes' => ' Dosya formatı geçerli değil.Desteklenen formatlar jpg,jpeg,png,gif !',
            'logo.max' => 'Dosya boyutu maksimum 2mb olmalı !',
        ];
    }
}
