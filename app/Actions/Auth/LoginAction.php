<?php

namespace App\Actions\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
  public function execute(array $request): string
  {
    $authenticate = Auth::attempt($request);
    throw_if(!$authenticate, new Exception('El usuario o contraseña no están correctos'));
    $user  = User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    return $token;
  }
}
