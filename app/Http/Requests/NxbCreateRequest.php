<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NxbCreateRequest extends FormRequest
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
            'manxb'             => 'required|min:3|max:20|unique:qltv_nxb', //tên table qtlv_nxb
            'tennxb'            => 'required|min:3|max:500',
        ];
    }
    public function messages() {
        return [
            'manxb.required'    => 'Vui lòng nhập mã nhà xuất bản',
            'manxb.min'         => 'Vui lòng nhập mã nhà xuất bản ít nhất 3 ký tự',
            'manxb.max'         => 'Vui lòng nhập mã nhà xuất bản tối đa 20 ký tự',
            'manxb.unique'      => 'Mã nhà xuất bản này đã tồn tại. Vui lòng nhập mã khác',

            'tennxb.required'   => 'Vui lòng nhập tên nhà xuất bản',
            'tennxb.min'        => 'Vui lòng nhập tên nhà xuất bản ít nhất 3 ký tự',
            'tennxb.max'        => 'Vui lòng nhập tên nhà xuất bản tối đa 500 ký tự'
        ];
    }
}
