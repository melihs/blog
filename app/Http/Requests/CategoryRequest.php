<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'up_id' => 'nullable',
            'title' => 'required',
            'description' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
                'title.required' => 'başlık bölümü boş bırakılamaz !',
                'description.required' => 'açıklama bölümü boş bırakılamaz !'
            ];
    }
}
