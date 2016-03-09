<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditContactRequest extends Request
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
         'firstName' => 'required|alpha|max:255',
         'lastName' => 'required|alpha|max:255',
         'phone' => 'required|regex:/[0-9]{9,12}/',
         'address' => 'required|string',
         'category' => 'required|in:family,work,friends',
         'email' => 'required|email|max:255'
         ];
    }
}
