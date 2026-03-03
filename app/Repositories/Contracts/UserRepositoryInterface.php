<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): User;
    public function addNote(int $userId, int $createdBy, string $content);
    public function create(array $data): User;
    public function update(int $id, array $data): User;
    public function delete(int $id): bool;
}