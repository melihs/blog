<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * post rules
     * @return array
     */

    public function rules()
    {
        return [
            'title' =>'required',
            'content' =>'required',
            'category_id' =>'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif,gif|max:2048'
        ];
    }

    /**
     *   rules message for post
     * @return array
     */

    public function messages()
    {
        return
            [
                'title.required' => 'başlık bölümü boş bırakılamaz !',
                'content.required' => 'açıklama bölümü boş bırakılamaz !',
                'category_id.required' => 'Lütfen bir kategori seçin !',
                'image.image' => 'Sadece resim dosyaları kaydedilir !',
                'image.mimes' => ' Dosya formatı geçerli değil.Desteklenen formatlar jpg,jpeg,png,gif !',
                'image.max' => 'Dosya boyutu maksimum 2mb olmalı !'
            ];
    }
}
