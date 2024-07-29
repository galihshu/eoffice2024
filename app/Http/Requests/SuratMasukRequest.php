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
            'jenissurat_id' => 'required|exists:jenis_surat,id',
            'perihal_masuk' => 'required|string|max:255',
            'tgl_surat' => 'nullable|date',
            'tgl_masuk' => 'nullable|date',
            'asal_surat' => 'required|string',
        ];

        // Kondisi untuk metode POST, file_upload wajib
        if ($this->isMethod('post')) {
            $rules['file_upload'] = 'required|file|mimes:pdf|max:5120'; // 5MB = 5120KB
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['file_upload'] = 'nullable|file|mimes:pdf|max:5120'; // 5MB = 5120KB
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'file_upload.required' => 'File upload diperlukan.',
            'file_upload.file' => 'File upload harus berupa file.',
            'file_upload.mimes' => 'File upload harus berupa file dengan format: pdf.',
            'file_upload.max' => 'File upload tidak boleh lebih dari 5MB.',
        ];
    }
}
