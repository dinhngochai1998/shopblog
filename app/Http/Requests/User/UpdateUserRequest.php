<?php

/**
 * Validate form update category
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'    => 'nullable',
            'email' => 'nullable|email',
            'title' => 'nullable|max:255',
            'gender' => 'max:255',
            'avatar' => 'nullable',
            'education' => 'nullable',
            'skills' => 'nullable',
            'notes' => 'nullable',
            'birthday' => 'nullable',
            'location' => 'nullable',
        ];
    }
}
