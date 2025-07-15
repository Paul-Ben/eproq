<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $fields = [
            'certificate_of_incorporation',
            'tin_certificate',
            'company_profile',
            'past_project_evidence',
            'other_document',
        ];
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field] = 'sometimes|file|mimes:pdf|max:20480';
        }
        return $rules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $fields = [
                'certificate_of_incorporation',
                'tin_certificate',
                'company_profile',
                'past_project_evidence',
                'other_document',
            ];
            $present = 0;
            foreach ($fields as $field) {
                if ($this->hasFile($field)) {
                    $present++;
                }
            }
            if ($present !== 1) {
                $validator->errors()->add('document', 'You must upload exactly one document at a time.');
            }
        });
    }
} 