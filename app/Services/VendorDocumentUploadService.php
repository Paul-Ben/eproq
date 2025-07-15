<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\VendorDetail;

class VendorDocumentUploadService
{
    public function uploadDocument(UploadedFile $file, VendorDetail $vendorDetail, string $field, string $folder = 'vendor-documents'): string
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $timestamp = now()->format('YmdHis');
        $newFilename = $filename . '_' . $timestamp . '.' . $extension;
        $path = $file->storeAs($folder, $newFilename, 'public');
    
        $vendorDetail->$field = $path;
        $vendorDetail->save();
        return $path;
    }

    
    public function updateDocument(UploadedFile $file, string $oldPath, string $folder = 'vendor-documents'): string
    {
        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
        return $this->uploadDocument($file, $folder);
    }

    
    public function deleteDocument(string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
} 