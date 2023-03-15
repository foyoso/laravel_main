<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class EditRequest extends FormRequest
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
            'name'=>['required',Rule::unique('websites')->whereNull('deleted_at')->ignore($this -> item ->id)],
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Website name required',
            'name.unique' => 'Website  exists',
        ];
    }
}
