<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'slug' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'value_account' => 'nullable',
            'bp_available' => 'nullable',
            'price' => 'nullable',
            'price_after_sale' => 'nullable',
            'category_id' => 'nullable',
            'linked_phone' => 'nullable',
            'linked_email' => 'nullable',
            'more' => 'nullable',
        ];
    }
}
