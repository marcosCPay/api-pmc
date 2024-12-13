<?php

namespace App\Services;

interface DocumentService
{
    public function getDocumentsByCasesId(int $casesId);
    public function downloadDocumentByPath(string $path);
}