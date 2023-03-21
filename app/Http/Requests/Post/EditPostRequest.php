<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
class EditPostRequest extends FormRequest
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
            'name'=>['required',Rule::unique('posts')->whereNull('deleted_at')->ignore($this -> item ->id)],

        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Post name required',
            'name.unique' => 'Post name  exists',
        ];
    }
    protected function failedValidation(Validator $validator) : void
    {
        throw new HttpResponseException(response()->json(['status'=>false, 'error'=>$validator->errors()], 202));
    }
}
