<?php

namespace App\ServicesImpl;

use App\Services\DocumentService;
use App\Repositories\DocumentRepository;
use App\Repositories\CaseRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\AttachmentRepository;
use Illuminate\Support\Facades\Storage;

class DocumentServiceImpl implements DocumentService
{
    protected $documentRepository, $caseRepository, $documentTypeRepository, $attachmentRepository;

    public function __construct(DocumentRepository $documentRepository, CaseRepository $caseRepository, DocumentTypeRepository $documentTypeRepository, AttachmentRepository $attachmentRepository)
    {
        $this->documentRepository = $documentRepository;

        $this->documentTypeRepository = $documentTypeRepository;

    }

    public function getDocumentsByCasesId(int $casesId)
    {

        $documents = $this->documentRepository->getByCasesId($casesId);
        // Collect all document_type IDs to fetch them in one query
        $documentTypeIds = $documents->pluck('document_type')->unique()->toArray();
        // Fetch all document types in one query
        $documentTypes = $this->documentTypeRepository->getByIds($documentTypeIds);
        $documentTypesMap = $documentTypes->keyBy('documenttypesid');
        $result = [];
        foreach ($documents as $document) {
            $documentType = $documentTypesMap[$document->document_type] ?? null;
            $result[] = [
                'title' => $document->title,
                'filename'=>$document->filename,
                'filetype'=>$document->filetype,
                'documentType' => $documentType->document_type,
                'documentTypePath' => $documentType->document_type_path,
            ];
        }
        return $result;
    }

    public function downloadDocumentByPath(string $path)
    {
        return $this->documentRepository->downloadDocumentByPath($path);
        
    }

}