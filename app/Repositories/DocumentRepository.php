<?php
namespace App\Repositories;

use App\Models\Document;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DocumentRepository
{
    public function getAll()
    {
        return Document::all();
    }

    public function getByCasesId(int $casesId)
    {
        $documents = Document::where('case', $casesId)->get();
        return $documents;
    }

    public function downloadDocumentByPath(string $path)
    {
        // Check if the file exists
        if (!Storage::disk('custom')->exists($path)) {
            throw new \Exception('File not found.');
        }
        $path = preg_replace('/[\x{200E}\x{200F}]/u', '', $path);
        // Get the file's content and its MIME type
        $absolutePath=Storage::disk('custom')->path($path);
        $fileContent = Storage::disk('custom')->get($path);
        $mimeType = Storage::disk('custom')->mimeType($path);
        $fileName = basename($path);


        // Ensure that the content is not base64-encoded, just raw binary data
        if (base64_encode(base64_decode($fileContent, true)) === $fileContent) {
            // If it's base64-encoded, decode it
            $fileContent = base64_decode($fileContent);
        }
        // Return the file data, MIME type, and filename
        return [
            'content' => $fileContent,
            'mime_type' => $mimeType,
            'file_name' => $fileName,
            'path'=>$absolutePath
        ];

    }


}
?>