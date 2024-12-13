<?php

namespace App\Services;

interface CaseService
{
    public function getAllCases();
    
    public function getLatestCase();
    
    public function storeCase(array $data);

    public function getCaseById(int $casesId);

    public function updateCase(array $data, int $casesId);

    public function deleteCase(int $casesId);
}