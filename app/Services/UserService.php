<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(protected UserRepositoryInterface $repository) {}

    public function getPaginatedUsers(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($filters, $perPage);
    }

    public function addNoteToUser(int $createdBy, int $userId, string $content): void
    {
        $user = $this->repository->find($userId);

        if (!$user) {
            throw new \Exception('User not found');
        }

        $this->repository->addNote($userId, $createdBy, $content);
    }

    public function toggleUserActive(int $userId): void
    {
        $user = $this->repository->find($userId);

        if (!$user) {
            throw new \Exception('User not found');
        }

        $this->repository->update($userId, ['active' => !$user->active]);
    }
}