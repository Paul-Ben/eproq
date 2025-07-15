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
        $vendorDetail = auth()->user()->vendorDetail;
        
        $validated = $request->validated();
        
        $data = [];

        foreach ($fields as $field) {
            if ($validated[$field]) {
                $data[$field] = $uploadService->uploadDocument($validated[$field], $vendorDetail, $field);
            } 
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Documents uploaded successfully.'
        ];

        return redirect()->back()->with($notification);
    }
}
