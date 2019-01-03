<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ad-soyad alanı boş bırakılamaz !',
            'email.required' => 'e-posta alanı boş bırakılamaz !',
            'email.email' => 'e-posta formatına uygun değil örnek: example@gmail.com !',
            'message.required' => 'message alanı boş bırakılamaz !'
        ];
    }
}
