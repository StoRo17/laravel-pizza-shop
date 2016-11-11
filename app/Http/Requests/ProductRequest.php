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
            'category' => 'required',
            'name' => 'required|string|unique:products,name|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'diameter' => 'integer|nullable',
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
            'name.regex' => 'Название пиццы должно состоять только из букв и пробелов.',
            'category.required' => 'Введите Категорию.',
            'price.required' => 'Введите Цену.',
            'weight.required' => 'Введите Вес.',
            'diameter.integer' => 'Диаметр должен состоять только из цифр.',
            'image.required' => 'Вставьте Изображение.',
            'composition.required' => 'Введите Ингридиенты'
        ];
    }
}
