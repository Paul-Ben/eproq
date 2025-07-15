<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadService
{
    public function download(string $disk, string $filePath, ?string $downloadName = null): StreamedResponse
    {
        if (!Storage::disk($disk)->exists($filePath)) {
            abort(404, 'File not found');
        }
        $downloadName = $downloadName ?: basename($filePath);
        return Storage::disk($disk)->download($filePath, $downloadName);
    }
}
