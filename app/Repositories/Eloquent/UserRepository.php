<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = User::query();

        if (!empty($filters['search']))
        {
            $query->where(function($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%');
            });
        }
        
        return $query->paginate($perPage);
    }

    public function addNote(int $userId, int $createdBy, string $content)
    {
        User::find($userId)->notes()->create([
            'created_by' => $createdBy,
            'content' => $content,
        ]);
    }

    public function find(int $id): User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        throw new \Exception('Not implemented');
    }

    public function update(int $id, array $data): User
    {
        $user = User::find($id);
        $user->update($data);

        return $user;
    }

    public function delete(int $id): bool
    {
        throw new \Exception('Not implemented');
    }
}