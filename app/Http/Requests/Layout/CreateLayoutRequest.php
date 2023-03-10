<?php

namespace App\Http\Requests\Layout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateLayoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return Auth::check();
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
            'name'=>'required|unique:layouts',
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Layout name required',
            'name.unique' => 'Layout exists'
        ];
    }
}
