<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreVendorDocumentRequest;
use App\Services\VendorDocumentUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorDetail;

class VendorController extends Controller
{
    public function addDocument(): View
    {
        return view('vendor.adddocument');
    }

    public function storeDocument(StoreVendorDocumentRequest $request, VendorDocumentUploadService $uploadService): RedirectResponse
    {
        \Log::info('FILES RECEIVED', ['files' => array_keys($request->allFiles())]);
        $vendorDetail = auth()->user()->vendorDetail;
        
        $validated = $request->validated();
        
        $data = [];
        $skipped = [];
        $fields = [
            'certificate_of_incorporation',
            'tin_certificate',
            'company_profile',
            'past_project_evidence',
            'other_document',
        ];

        foreach ($fields as $field) {
            if (isset($validated[$field]) && $validated[$field]) {
                $data[$field] = $uploadService->uploadDocument($validated[$field], $vendorDetail, $field);
            } else {
                $skipped[] = $field;
            }
        }

        if (count($skipped) > 0) {
            \Log::info('Vendor document upload skipped fields', [
                'user_id' => auth()->id(),
                'skipped_fields' => $skipped
            ]);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Documents uploaded successfully.'
        ];

        return redirect()->back()->with($notification);
    }
}
