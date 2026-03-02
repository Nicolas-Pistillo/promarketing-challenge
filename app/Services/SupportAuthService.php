<?php

namespace App\Services;

use App\Models\SupportAgent;
use Illuminate\Support\Facades\Auth;

class SupportAuthService
{
    public function login(string $email, string $password): bool
    {
        return Auth::guard('support')->attempt([
            'email' => $email,
            'password' => $password
        ]);
    }

    public function logout(): void
    {
        Auth::guard('support')->logout();
    }

    public function user(): SupportAgent
    {
        return Auth::guard('support')->user();
    }
}