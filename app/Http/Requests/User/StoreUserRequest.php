<?php

/**
 * Validate form create user
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'    => 'required|max:6',
            'email' => 'required',
            'password' => 'min:6|required|max:255',
            'title' => 'required|max:255',
            'avatar' => 'required|image',
            'education' => 'required|max:255',
            'skills' => 'required|max:255',
            'notes' => 'required|max:255',
            'birthday' => 'nullable|max:255',
            'location' => 'required|max:255',
            'gender' => 'required'
        ];
    }
}
