<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Brevo extends Facade
{
  protected static function getFacadeAccessor(): string
  {
    return 'brevo';
  }
}
