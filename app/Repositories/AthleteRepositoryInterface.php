<?php

namespace App\Repositories\Contracts;

use App\Models\Athlete;
use Illuminate\Support\Collection;

interface AthleteRepositoryInterface
{
    /**
     * Get all athletes.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;

    /**
     * Get an athlete by ID.
     *
     * @param int $id
     * @return \App\Models\Athlete|null
     */
    public function find(int $id): ?Athlete;

    /**
     * Create a new athlete.
     *
     * @param array $data
     * @return \App\Models\Athlete
     */
    public function create(array $data): Athlete;

    /**
     * Update an existing athlete.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Athlete
     */
    public function update(int $id, array $data): Athlete;

    /**
     * Delete an athlete.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
