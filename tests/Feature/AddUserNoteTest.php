<?php

use App\Models\SupportAgent;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('Support agent can add a note to a user', function () {
    $user = User::factory()->create();

    $supportAgent = SupportAgent::create(
        [
            'name'            => 'John Doe',
            'employee_number' => 123456,
            'email'           => 'john.doe@example.com',
            'password'        => Hash::make('password')
        ]
    );

    expect($user->notes)->toHaveCount(0);

    $service = app(UserService::class);
    $service->addNoteToUser($supportAgent->id, $user->id, 'This is a test note. Please give love to this challenge');

    $user->refresh();

    expect($user->notes)->toHaveCount(1);
});
