<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
  protected $settings;

  public function __construct()
  {
    $this->load();
  }

  public function load()
  {
    return $this->settings = Setting::first();
  }

  public function get($key, $default = null)
  {
    if (!$this->settings) {
      $this->load();
    }
    return $this->settings->$key ?? $default;
  }


  public function isFeatureEnabled($feature): bool
  {
    return (bool) $this->get($feature, false);
  }
}
