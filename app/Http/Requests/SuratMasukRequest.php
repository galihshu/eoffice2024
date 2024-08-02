<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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
            'jenis_surat' => 'required|exists:jenis_surat,id',
            'perihal' => 'required|string|max:255',
            'tgl_surat' => 'nullable|date',
            'tgl_masuk' => 'nullable|date',
            'asal_surat' => 'required|string',
        ];

        // Kondisi untuk metode POST, file_upload wajib
        if ($this->isMethod('post')) {
            $rules['file_upload'] = 'required|file|mimes:pdf|max:5120'; // 5MB = 5120KB
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['file_upload'] = 'nullable|file|mimes:pdf|max:5120'; // 5MB = 5120KB
            $rules['status'] = 'required|in:1,2,3,4,5,6';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'jenis_surat' => 'Jenis Surat',
            'perihal' => 'Perihal',
            'file_upload' => 'File',
            'tgl_surat' => 'Tanggal Surat',
            'tgl_masuk' => 'Tanggal Masuk',
            'asal_surat' => 'Asal Surat',
            'status' => 'Status',
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
            'in' => ':attribute tidak valid.',
        ];
    }
}
