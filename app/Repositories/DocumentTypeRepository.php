<?php
namespace App\Repositories;

use App\Models\DocumentType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentTypeRepository
{
    public function getAll()
    {
        return DocumentType::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastDocumentType = DocumentType::latest('documenttypesid')->first();
        return $lastDocumentType;

    }

    public function store(array $data)
    {
        return DocumentType::create($data);
    }

    public function getById(int $documentTypesId)
    {
        $documentType = DocumentType::where('documenttypesid', $documentTypesId)->first();
        return $documentType;
    }

    public function getByIds(array $documentTypesId)
    {
        $documentTypeIds=DocumentType::whereIn('documenttypesid',$documentTypesId)->get();
        return $documentTypeIds;
    }

    public function update(array $data, int $documentTypesId)
    {
        // Find the Documents record by documenttypesid
        $documentType = DocumentType::where('documenttypesid', $documentTypesId)->first();

        // Update the Documents record with the request data
        $documentType->update($data);

        // Return the updated Documents record
        return $documentType;
    }

    public function delete(int $documentTypesId)
    {
        // Find the Documents record by documenttypesid
        $documentType = DocumentType::where('documenttypesid', $documentTypesId)->first();

        // Delete the Documents record
        $documentType->delete();

    }
}
?>