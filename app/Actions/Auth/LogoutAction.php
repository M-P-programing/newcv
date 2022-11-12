<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutAction
{
  public function execute(): void
  {
    $user   = Auth::user();
    $user->tokens()->delete();
  }
}
