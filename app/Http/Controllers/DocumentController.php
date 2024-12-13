<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Services\DocumentService;

class DocumentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function getDocumentsByCasesId(Request $request)
    {
        try {
            $casesId = $request->input('casesId');
            $documents = $this->documentService->getDocumentsByCasesId($casesId);
            if ($documents) {
                return response()->json($documents);
            }
            return response()->json(['message' => 'Documents not found'], 404);
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error occurred: ' . $e->getMessage());

            // You can also return a custom error response
            return response()->json([
                'error' => 'An error occurred. Please try again later.',
                'details' => $e->getMessage() // Aquí se incluye el detalle del error
            ], 500);
        }

    }

    public function downloadDocumentByPath(Request $request)
    {
        try {
            // Validate the input to ensure 'path' is provided
            $request->validate([
                'path' => 'required|string',
            ]);
            // Get the path from the request
            $path = $request->input('path');
            $fileData = $this->documentService->downloadDocumentByPath($path);
            // Return the file content as a downloadable response
            // Return the file content as a downloadable response
            return response()->download(
                storage_path('app/documents'.$path),  // This should be the full file path
                $fileData['file_name'], // File name to be used for the download
                [
                    'Content-Type' => $fileData['mime_type'],  // MIME type for the file
                ]
            );


        } catch (Exception $e) {
            // Log the error
            \Log::error('Error occurred: ' . $e->getMessage());

            // You can also return a custom error response
            return response()->json([
                'error' => 'An error occurred. Please try again later.',
                'details' => $e->getMessage(), // Aquí se incluye el detalle del error
                'trace' => $e->getTraceAsString()
            ], 500);
        }



    }


}
