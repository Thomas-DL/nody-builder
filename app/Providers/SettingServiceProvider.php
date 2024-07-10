<?php

namespace App\Providers;

use App\Facades\Settings;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton('settings', function ($app) {
      return new \App\Services\SettingService();
    });
  }

  public function boot()
  {
    Settings::load();
  }
}
