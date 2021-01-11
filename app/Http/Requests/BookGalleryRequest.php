<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookGalleryRequest extends FormRequest
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
            'databook_id' => 'required|exists:data_books,_id',
            'photo' => 'required|mimes:jpg,jpeg,png'
        ];
    }
}
