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

    public function find(int $id): User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        throw new \Exception('Not implemented');
    }

    public function update($id, array $data): User
    {
        throw new \Exception('Not implemented');
    }

    public function delete($id): bool
    {
        throw new \Exception('Not implemented');
    }
}