<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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

    public function rules()
    {
        return [
            'iduser' => 'required',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'iduser.required' => 'Người dùng không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'iduser.phone' => 'Người dùng phải nhập số điện thoại',
            'lat.required' => 'Vĩ độ bãi đổ xe không được để trống',
            'long.required' => 'Kinh độ bãi đổ xe không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'long.numberic' => 'Kinh độ bãi đổ xe phải là một số',
            'lat.numberic' => 'Vĩ độ bãi đổ xe phải là một số',
            'status.numberic' => 'Trạng thái phải là một số',

        ];
    }
}
