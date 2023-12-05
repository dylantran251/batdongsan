<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:30|max:100',
            'description' => 'required|string|min:30',
            'short_description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'area' => 'required|numeric',
            'images' => 'required|image',
            'floors' => 'required|integer',
            'bedroom' => 'required|integer',
            'toilet' => 'required|integer',
            'legal_documents' => 'required',
            'real_estate_type' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề bài đăng',
            'description' => 'Nội dung',
            'short_description' => 'Mô tả ngắn',
            'price' => 'Giá',
            'location' => 'Vị trí',
            'area' => 'Diện tích',
            'images' => 'Danh sách ảnh',
            'floors' => 'Số tầng',
            'bedroom' => 'Số phòng ngủ',
            'toilet' => 'Số nhà vệ sinh',
            'legal_documents' => 'Giấy tờ ',
            'real_estate_type' => 'Loại nhà đất',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
        ];
    }
}
