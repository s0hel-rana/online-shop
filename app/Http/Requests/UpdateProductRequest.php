<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'is_featured' => ['in:yes,no'],
            'compare_price' => 'nullable|numeric',
            'sku' => 'nullable',
            'barcode' => 'nullable',
            'track_qty' => ['in:yes,no'],
            'qty' => 'required|numeric',
            'status' => ['in:active,inactive'],
        ];
    }
}
