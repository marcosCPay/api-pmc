<?php

namespace App\Services;

interface AttachmentService
{
    public function getAllAttachments();
    
    public function getLatestAttachment();
    
    public function storeAttachment(array $data);

    public function getAttachmentById(int $attachmentsId);

    public function updateAttachment(array $data, int $attachmentsId);

    public function deleteAttachment(int $attachmentsId);
}