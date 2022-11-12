<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
  public function login(LoginRequest $request, LoginAction $action)
  {
    $token = $action->execute($request->only('email', 'password'));

    return response()->json(compact('token'));
  }

  public function logout(LogoutAction $action)
  {
    $action->execute();
    $result = true;
    return response()->json(compact('result'));

  }
}
