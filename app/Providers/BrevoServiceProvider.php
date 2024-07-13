<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BrevoServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton('brevo', function ($app) {
      return new \App\Services\BrevoService();
    });
  }
}
