<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $viewer     = Role::create(['name' => 'support-viewer', 'guard_name' => 'support']);
        $operative  = Role::create(['name' => 'support-operative', 'guard_name' => 'support']);
        Role::create(['name' => 'support-admin', 'guard_name' => 'support']);

        // Permissions
        $viewUsers    = Permission::create(['name' => 'view-users', 'guard_name' => 'support']);
        $createUsers  = Permission::create(['name' => 'create-users', 'guard_name' => 'support']);
        $editUsers    = Permission::create(['name' => 'edit-users', 'guard_name' => 'support']);
        $deleteUsers  = Permission::create(['name' => 'delete-users', 'guard_name' => 'support']);
        $addUserNotes = Permission::create(['name' => 'add-user-notes', 'guard_name' => 'support']);
        $suspendUsers  = Permission::create(['name' => 'suspend-users', 'guard_name' => 'support']);

        $viewTickets    = Permission::create(['name' => 'view-tickets', 'guard_name' => 'support']);
        $replyTickets   = Permission::create(['name' => 'reply-tickets', 'guard_name' => 'support']);
        $closeTickets   = Permission::create(['name' => 'close-tickets', 'guard_name' => 'support']);

        // Assign permissions to roles
        $viewer->givePermissionTo($viewUsers, $viewTickets);

        $operative->givePermissionTo([
            $viewUsers,
            $createUsers,
            $editUsers,
            $viewTickets,
            $replyTickets,
            $closeTickets,
            $addUserNotes,
            $deleteUsers,
            $suspendUsers
        ]);
    }
}
