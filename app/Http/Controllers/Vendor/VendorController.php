<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreVendorDocumentRequest;
use App\Http\Requests\UpdateVendorDocumentRequest;
use App\Services\VendorDocumentUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorDetail;
use App\Services\DownloadService;

class VendorController extends Controller
{
    public function __construct(
        protected DownloadService $downloadService,
        protected VendorDocumentUploadService $uploadService
    ) {}

    public function addDocument(): View
    {
        return view('vendor.adddocument');
    }

    public function storeDocument(StoreVendorDocumentRequest $request): RedirectResponse
    {
        $vendorDetail = auth()->user()->vendorDetail;
        $validated = $request->validated();
        $data = [];
        foreach ($validated as $field => $file) {
            if (!empty($file)) {
                $data[$field] = $this->uploadService->uploadDocument($file, $vendorDetail, $field);
            }
        }
        $notification = [
            'alert-type' => 'success',
            'message' => 'Documents uploaded successfully.'
        ];
        return redirect()->route('vendor.alldocuments')->with($notification);
    }

    public function allDocuments(): View
    {
        $vendorDetail = auth()->user()->vendorDetail;
        $documentFields = [
            'certificate_of_incorporation' => 'Certificate of Incorporation',
            'tin_certificate' => 'TIN Certificate',
            'company_profile' => 'Company Profile',
            'past_project_evidence' => 'Past Project Evidence',
            'other_document' => 'Other Document',
        ];

        $hasAnyDocument = false;
        foreach ($documentFields as $field => $type) {
            if (!empty($vendorDetail->$field)) {
                $hasAnyDocument = true;
                break;
            }
        }
        return view('vendor.alldocuments', compact('vendorDetail', 'documentFields', 'hasAnyDocument'));
    }

    public function updateDocument(UpdateVendorDocumentRequest $request, VendorDetail $vendorDetail, string $field)
    {

        $validated = $request->validated();

        if (!isset($validated[$field])) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'No file uploaded.'
            ];
            return redirect()->back()->with($notification);
        }

        $file = $validated[$field];

        $newPath = $this->uploadService->updateDocument($file, $vendorDetail, $field);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Document updated successfully.'
        ];
        return redirect()->back()->with($notification);
    }

    public function downloadDocument(VendorDetail $vendorDetail, string $field)
    {
        $filePath = $vendorDetail->$field;

        if (!$filePath) {

            $notification = [
                'alert-type' => 'error',
                'message' => 'File not found.'
            ];
            return redirect()->back()->with($notification);
        }
        $filename = basename($filePath);

        return $this->downloadService->download('public', $filePath, $filename);
    }
}
