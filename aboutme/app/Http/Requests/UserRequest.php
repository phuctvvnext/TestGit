<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|min:6',
            'fullname'=>'required|min:6',
            'password'=>'required|min:6'
        ];
    }
    public function messages() {
        return [
            'username.required'=>'Ban phai nhap ten danh nhap ',
            'username.min'=>'ten dang nhap co it nhat 6 ki tu',
            'fullname.required'=>'Ban phai nhap fullname',
            'fullname.min'=>'Fullname co it nhat 6 ki tu',
            'password.required'=>'Ban phai nhap mat khau',
            'password.min'=>'Mat khau co it nhat 6 ki tu'
        ];
    }
}
