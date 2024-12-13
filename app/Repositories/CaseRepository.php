<?php
namespace App\Repositories;

use App\Models\Cases;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CaseRepository
{
    public function getAll()
    {
        return Cases::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastCases = Cases::latest('casesid')->first();
        return $lastCases;
        
    }

    public function store(array $data)
    {
        return Cases::create($data);
    }

    public function getById(int $casesId)
    {
        $cases = Cases::where('casesid', $casesId)->first();
        return $cases;
    }

    public function update(array $data, int $casesId)
    {
        // Find the Casess record by Cases_id
        $cases = Cases::where('casesid', $casesId)->first();

        // Update the Casess record with the request data
        $cases->update($data);

        // Return the updated Casess record
        return $cases;
    }

    public function delete(int $casesId)
    {
        // Find the Casess record by Cases_id
        $cases = Cases::where('casesid', $casesId)->first();

        // Delete the Casess record
        $cases->delete();

    }
}
?>