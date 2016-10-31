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
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|string|alpha',
            'name' => 'required|string|unique:products,name|alpha',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'required|image',
            'composition' => 'required|string',
            'description' => 'string|nullable'
        ];
    }

    /**
     * Get the errors messages for the defined validation rules
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Введите Название.',
            'name.unique' => 'Такое название пиццы уже существует.',
            'name.alpha' => 'Название пиццы должно состоять только из букв.',
            'category.required' => 'Введите Категрию.',
            'category.alpha' => 'Категория должна состоять только из букв.',
            'price.required' => 'Введите Цену.',
            'weight.required' => 'Введите Вес.',
            'image.required' => 'Вставьте Изображение.',
            'composition.required' => 'Введите Ингридиенты'
        ];
    }
}
