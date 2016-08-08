<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
class HomeRequest extends Request
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
          'sdt'=>'required|numeric',
          'scmnd'=>'required|numeric',
          'tinh'=>'required',
          'hinhthucvay'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'hoten.required'=>'Vui lòng nhập họ tên',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
            'scmnd.required'=>'Vui lòng nhập số chứng minh nhân dân',
            'tinh.required'=>'Vui lòng chọn tỉnh',
            'hinhthucvay.required'=>'Vui lòng chọn hình thức vay',
	    'sdt.numeric'=>'Bạn nhập sai định dạng số điện thoại',
	    'scmnd.numeric'=>'Bạn nhập sai định dạng số CMND',
        ];
    }
}
