<?php

namespace App\Services;

interface DocumentTypeService
{
    public function getAllDocumentTypes();
    
    public function getLatestDocumentType();
    
    public function storeDocumentType(array $data);

    public function getDocumentTypeById(int $documentTypesId);

    public function updateDocumentType(array $data, int $documentTypesId);

    public function deleteDocumentType(int $documentTypesId);
}