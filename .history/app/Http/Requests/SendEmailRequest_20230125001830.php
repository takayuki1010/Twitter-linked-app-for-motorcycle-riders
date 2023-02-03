<?php
// パスワードリセットの為のリクエストファイル
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //バリデーション
            'checkemail' => ['required','email:filter', 'exists:user,email']
        ];
    }

        /**
     * バリデーションメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [
            'checkemail.required' => ':attributeを入力してください',
            'checkemail.email' => '正しいメールアドレスの形式で入力してください',
            'checkemail.exists' => '登録している:attributeを入力してください'
        ];
    }

        /**
     * attribute名をカスタマイズ
     * @return array
     */
    public function attributes()
    {
        return [
            'checkemail' => 'メールアドレス',
        ];
    }
}
