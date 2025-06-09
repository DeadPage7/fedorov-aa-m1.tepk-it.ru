<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'material_type_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'warehouse' => 'required|numeric|min:0',
            'minimum' => 'required|numeric|min:0',
            'packaging' => 'required|numeric|min:0',
            'unit_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'material_type_id' => 'Тип материала обязателен',

            'name.required' => 'Имя материала обязательно',
            'name.max' => 'Имя не должно превышать 255 символов',

            'price.required' => 'Цена обязательно',
            'price.max' => 'Цена не должна быть меньше 0',

            'warehouse.required' => 'Количество на складе обязательно',
            'warehouse.max' => 'Количество на складе не должно быть меньше 0',

            'minimum.required' => 'Минимальное количество материала обязательно',
            'minimum.max' => 'Минимальное количество не должно быть меньше 0',

            'packaging.required' => 'Количество в упаковке обязательно',
            'packaging.max' => 'Количество в упаковке не должно быть меньше 0',

            'unit_id.required' => 'Единица измерения обязательна',
        ];
    }

}
