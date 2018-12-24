<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPost extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
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

    public function messages()
    {
        return
        [
          'title.required' => 'başlık bölümü boş bırakılamaz !',
          'content.required' => 'açıklama bölümü boş bırakılamaz !',
          'category_id.required' => 'Lütfen bir kategori seçin',
          'image.image' => 'Sadece resim dosyaları kaydedilir !',
          'image.mimes' => ' Dosya formatı geçerli değil.Desteklenen formatlar jpg,jpeg,png,gif !',
          'image.max' => 'Dosya boyutu maksimum 2mb olmalı !',
        ];
    }
}
