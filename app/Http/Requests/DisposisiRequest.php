<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisposisiRequest extends FormRequest
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
        $rules = [
            'tujuan' => 'required|exists:users,id',
            'tgl_disposisi' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ];

        // Kondisi untuk metode POST, file_upload wajib
        if ($this->isMethod('post')) {
            $rules['file_upload'] = 'required|file|mimes:pdf|max:5120'; // 5MB = 5120KB
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['file_upload'] = 'nullable|file|mimes:pdf|max:5120'; // 5MB = 5120KB
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'tujuan' => 'User Tujuan',
            'tgl_disposisi' => 'Tgl. Disposisi',
            'file_upload' => 'File Upload',
            'keterangan' => 'Ket. Disposisi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute diperlukan.',
            'string' => ':attribute harus berupa string.',
            'date' => ':attribute harus berupa tanggal.',
            'exists' => ':attribute tidak ditemukan.',
            'max' => ':attribute tidak boleh lebih dari :max',
            'mimes' => ':attribute harus berupa file dengan format: pdf.',
            'file' => ':attribute harus berupa file.',
        ];
    }
}
