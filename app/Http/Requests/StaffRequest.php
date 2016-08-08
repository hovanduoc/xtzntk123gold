<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StaffRequest extends Request
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
          'hoten'=>'required',
          'diachi'=>'required',
          'ngaysinh'=>'required|date_format:d-m-Y',
          'gioitinh'=>'required',
          'email'=>'required|email',
          'tinh'=>'required',
          'sdt'      => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
          'matkhau'=>'required',
	  'power'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'hoten.required'=>'Vui lòng nhập họ tên',
            'ngaysinh.required'=>'Vui lòng nhập ngày sinh',
            'ngaysinh.date_format'=>'Không nhập đúng định dạng ngày sinh',
            'gioitinh.required'=>'Vui lòng nhập giới tính',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Nhập sai định dạng email',
            'tinh.required'=>'Vui lòng chọn tỉnh',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
            'sdt.regex'=>'Nhập sai định dạng số điện thoại',
            'matkhau.required'=>'Vui lòng nhập mật khẩu',
            'diachi.required'=>'Vui lòng nhập địa chỉ',
	    'power.required'=>'Chọn tỉnh thành quản lý',
        ];
    }
}
