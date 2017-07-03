<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
                'email' => 'required|unique:emails',
                'subject' => 'required',
                'file' => 'required',
                'message' => 'required',
        ];
    }

    public function messages()
{
    return [
        'email.unique' => 'Someone has already sent email to this person',
    ];
}
}
