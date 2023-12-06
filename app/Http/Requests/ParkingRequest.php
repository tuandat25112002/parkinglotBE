<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ParkingRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'max' => 'required|numeric',
            'image' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên bãi đổ xe không được để trống',
            'address.required' => 'Địa chỉ bãi đổ xe không được để trống',
            'image.required' => 'Hình ảnh bãi đổ xe không được để trống',
            'lat.required' => 'Vĩ độ bãi đổ xe không được để trống',
            'long.required' => 'Kinh độ bãi đổ xe không được để trống',
            'max.required' => 'Số vị trí đổ xe không được để trống',
            'long.numberic' => 'Kinh độ bãi đổ xe phải là một số',
            'lat.numberic' => 'Vĩ độ bãi đổ xe phải là một số',
            'max.numberic' => 'Số vị trí của bãi đổ xe phải là một số',

        ];
    }
    // protected function failedValidation(Validator $validator)
    // {

    //     $errors = $validator->errors()->all();
    //     throw new HttpResponseException(response()->json([
    //         'success' => false,
    //         'message' => 'Validation errors',
    //         'data' => $errors,
    //         'errors' => $validator->errors(),
    //         'status' => 422,
    //     ], 422));
    // }
}
