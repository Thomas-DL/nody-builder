<?php

namespace App\Http\Webhooks\Class;

use App\Models\User;

class GrantLifetimeAccess
{
  public function grantLifetimeAccess(string $email): void
  {
    $user = User::where('email', $email)->first();
    if ($user) {
      $user->lifetime_access = true;
      $user->save();
    }
  }
}
