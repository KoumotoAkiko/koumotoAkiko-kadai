<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'gender'=>['required'],
            'email'=>['required','string','email','max:255'],
            'tel'=>['required','numeric','regex:/^\d+$/','digits_between:1,5'],
            'address'=>['required','string','max:255'],
            'content'=>['required'],
            'detail'=>['required','string','max:120'],
            
        ];
    }

    public function messages(){
        return[
            'first_name.required'=>'姓を入力してください',
            'first_name.storing'=>'姓を文字列で入力してください',
            'first_name.max'=>'姓を255文字以下で入力してくだい',
            'last_name.required'=>'名を入力してください',
            'last_name.storing'=>'名を文字列で入力してください',
            'last_name.max'=>'名を255文字以下で入力してください',
            'gender.required'=>'性別を選択してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.string'=>'メールアドレスを文字列で入力してください',
            'email.email'=>'有効なメールアドレス形式で入力してください',
            'email.max'=>'メールアドレスを255文字以下で入力してください',
            'tel.required'=>'電話番号を入力してください',
            'tel.regex'=>'半角数字 ハイフンなしで入力してください',
            'tel.digits_between'=>'電話番号を５桁までの数字で入力してください',
            'address.required'=>'住所を入力してください',
            'address.string'=>'住所を文字列でん入力してください',
            'address.max'=>'住所を255文字以下で入力してください',
            'content.required'=>'お問い合わせの種類を選択してください',
            'detail.required'=>'お問い合わせの内容を入力してください',
            'detail.string'=>'お問い合わせの内容を文字列で入力してください',
            'detail.max'=>'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
