<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TokenExpirationTimeRule;

class ResetPasswordRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:6', 'max:12', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
            'reset_token' => ['required', new TokenExpirationTimeRule],
        ];
    }

    /**
     * バリデーションメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => ':attributeを入力してください',
            'password.regex' => ':attributeは6文字以上、12文字以下で設定してください。',
            'password.confirmed' => ':attributeが再入力欄と一致していません',
        ];
    }

    /**
     * attribute名をカスタマイズ
     * @return array
     */
    public function attributes()
    {
        return [
            'password' => 'パスワード',
        ];
    }
}
