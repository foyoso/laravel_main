<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
class EditPortfolioRequest extends FormRequest
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
            'name'=>['required',Rule::unique('portfolios')->where('user_id', $this -> website -> user_id)->whereNull('deleted_at')->ignore($this -> item ->id)],

        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Portfolio name required',
            'name.unique' => 'Portfolio name  exists',
        ];
    }
}
