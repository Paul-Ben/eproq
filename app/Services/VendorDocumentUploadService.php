<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\VendorDetail;

class VendorDocumentUploadService
{
    public function uploadDocument(UploadedFile $file, VendorDetail $vendorDetail, string $field, string $folder = 'vendor-documents'): string
    {

        $firstWord = Str::of($vendorDetail->company_name)->explode(' ')->first();
        $extension = $file->getClientOriginalExtension();
        $timestamp = now()->format('YmdHis');
        $newFilename = 'BSPP' . '_' . $firstWord . '_' . $field . '_' . $timestamp . '.' . $extension;
        $path = $file->storeAs($folder, $newFilename, 'public');
        $vendorDetail->$field = $path;
        $vendorDetail->save();
        return $path;
    }


    public function updateDocument(UploadedFile $file, VendorDetail $vendorDetail, string $field, string $folder = 'vendor-documents'): string
    {
        $oldPath = $vendorDetail->$field;
        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
        return $this->uploadDocument($file, $vendorDetail, $field, $folder);
    }


    public function deleteDocument(string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
}