<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editNewsReq extends FormRequest
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
         'title' => 'required|min:20|max:255',
         'description' => 'required|min:20',
         'author' => 'required|min:3|max:100',
         'content' => 'required|min:20',
         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ];
 }
}
