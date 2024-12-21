<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuonsachCreateRequest extends FormRequest
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
            'mamuon'                => 'required|min:3|max:50|unique:qltv_muonsach', //tên table qtlv_muonsach
            'soluong'               => 'required',
            'thuthu_id'             => 'required',
            'docgia_id'             => 'required',
            'sach_id'               => 'required',
        ];
    }
    public function messages() {
        return [
            'soluong.required'     => 'Vui lòng nhập số lượng sách mượn',
            'thuthu_id.required'   => 'Vui lòng chọn thủ thư cho mượn sách',
            'docgia_id.required'   => 'Vui lòng chọn đọc giả mượn sách',
            'sach_id.required'     => 'Vui lòng chọn sách mượn'
        ];
    }
}
