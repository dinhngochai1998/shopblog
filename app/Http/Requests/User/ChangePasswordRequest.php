<?php

/**
 * Validate form changepassword
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'min:6|required|max:255',
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password|required|max:255',
        ];
    }
}
