<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class EditWebTypeRequest extends FormRequest
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
            'name'=>['required',Rule::unique('website_types')->whereNull('deleted_at')->ignore($this -> item ->id)],
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Website type name required',
            'name.unique' => 'Website  exists',
        ];
    }
}
