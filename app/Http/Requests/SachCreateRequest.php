<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SachCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // authentication -> xác thực
        // authorize -> phân quyền
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
            'masach'                => 'required|min:3|max:50|unique:qltv_sach', //tên table qtlv_sach
            'tensach'               => 'required|min:3|max:500',
            'tentacgia'             => 'required|min:3|max:200',
            'soluong'               => 'required',
            'theloai_id'            => 'required',
            'nxb_id'                => 'required',

        ];
    }
    public function messages() {
        return [
            'masach.unique'         => 'Mã sách này đã tồn tại. Vui lòng nhập mã khác',

            'tensach.required'      => 'Vui lòng nhập tên sách',
            'tensach.min'           => 'Vui lòng nhập tên sách ít nhất 3 ký tự',
            'tensach.max'           => 'Vui lòng nhập tên sách tối đa 500 ký tự',

            'tentacgia.required'    => 'Vui lòng nhập tên tác giả',
            'tentacgia.min'         => 'Vui lòng nhập tên tác giả ít nhất 3 ký tự',
            'tentacgia.max'         => 'Vui lòng nhập tên tác giả tối đa 500 ký tự',

            'soluong.required'      => 'Vui lòng nhập số lượng của sách',

            'theloai_id.required'   => 'Vui lòng chọn thể loại',

            'nxb_id.required'       => 'Vui lòng chọn nhà xuất bản'
        ];
    }
}
