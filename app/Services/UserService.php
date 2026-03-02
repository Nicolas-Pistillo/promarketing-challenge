<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(protected UserRepositoryInterface $repository) {}

    public function getPaginatedUsers(array $filters = [], int $perPage = 15)
    {
        return $this->repository->paginate($filters, $perPage);
    }

    public function addNoteToUser(int $createdBy, int $userId, string $content)
    {
        $user = $this->repository->find($userId);

        if (!$user) {
            throw new \Exception('User not found');
        }

        $user->notes()->create([
            'created_by' => $createdBy,
            'content' => $content,
        ]);
    }
}