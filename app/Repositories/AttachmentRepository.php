<?php
namespace App\Repositories;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttachmentRepository
{
    public function getAll()
    {
        return Attachment::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastAttachment = Attachment::latest('attachmentsid')->first();
        return $lastAttachment;
        
    }

    public function store(array $data)
    {
        return Attachment::create($data);
    }

    public function getById(int $attachmentsId)
    {
        $attachment = Attachment::where('attachmentsid', $attachmentsId)->first();
        return $attachment;
    }

    public function update(array $data, int $attachmentsId)
    {
        // Find the Attachments record by attachmentsid
        $attachment = Attachment::where('attachmentsid', $attachmentsId)->first();

        // Update the Attachments record with the request data
        $attachment->update($data);

        // Return the updated Attachments record
        return $attachment;
    }

    public function delete(int $attachmentsId)
    {
        // Find the Attachments record by attachmentsid
        $attachment = Attachment::where('attachmentsid', $attachmentsId)->first();

        // Delete the Attachments record
        $attachment->delete();

    }
}
?>