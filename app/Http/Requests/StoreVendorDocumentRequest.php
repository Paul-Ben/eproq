<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorDocumentRequest extends FormRequest
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
            'certificate_of_incorporation' => 'required|file|mimes:pdf|max:20480',
            'tin_certificate' => 'required|file|mimes:pdf|max:20480',
            'company_profile' => 'required|file|mimes:pdf|max:20480',
            'past_project_evidence' => 'nullable|file|mimes:pdf|max:20480',
            'other_document' => 'nullable|file|mimes:pdf|max:20480',
        ];
    }
}
