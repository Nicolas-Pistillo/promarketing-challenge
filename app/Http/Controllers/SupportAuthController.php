<?php

namespace App\Http\Controllers;

use App\Services\SupportAuthService;
use Illuminate\Http\Request;

class SupportAuthController extends Controller
{
    public function __construct(private SupportAuthService $service) {}

    public function login(Request $request)
    {
        if (empty($request->email) || empty($request->password)) 
        {
            return back()->withErrors(['login_failed' => 'El correo y contraseña son requeridos'])
                        ->withInput($request->only('email'));
            
        }

        $result = $this->service->login($request->email, $request->password);

        if (!$result) {
            return back()->withErrors(['login_failed' => 'Correo o contraseña incorrectos'])
                        ->withInput($request->only('email'));
        }

        return redirect()->route('support.panel.index');
    }
    
    public function logout()
    {
        $this->service->logout();
        return redirect()->route('support.login-view');
    }
}
