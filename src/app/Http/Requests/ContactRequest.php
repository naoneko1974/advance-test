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
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => ['email','required'],
            'postcode' => ['required','min:8','max:8'],
            'address' => ['required','max:255'],
            'building_name' => 'max:255',
            'opinion' => ['required','max:120']
        ];
    }

    public function messages(){
        return [
            'first-name.required' => '名字を入力してください',
            'last-name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.min' => '郵便番号はハイフン入りの8桁で入力してください',
            'postcode.max' => '郵便番号はハイフン入りの8桁で入力してください',
            'address.required' => '住所を入力してください',
            'address.max' => '住所を255文字以内で入力してください',
            'building_name.max' => '建物名は255文字以内で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => 'ご意見は120文字以内で入力してください',

        ];
    }
}
