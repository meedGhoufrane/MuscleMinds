<?php 

namespace App\Repositories;

use App\Models\Athlete;

class AthleteRepository
{
    public function getAll()
    {
        return Athlete::all();
    }

    public function create(array $data)
    {
        return Athlete::create($data);
    }

    public function find($id)
    {
        return Athlete::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $athlete = $this->find($id);
        $athlete->update($data);
        return $athlete;
    }

    public function delete($id)
    {
        $athlete = $this->find($id);
        $athlete->delete();
    }
}
