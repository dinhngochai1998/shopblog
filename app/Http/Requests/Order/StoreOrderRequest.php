<?php

/**
 * Validate form category
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'total' => 'nullable|max:20',
            'order_date' => 'nullable',
            'order_number' => 'nullable',
            'customer_address' => 'nullable',
            'customer_name' => 'nullable|max:40',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|max:255',
        ];
    }
}
