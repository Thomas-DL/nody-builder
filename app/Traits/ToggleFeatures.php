<?php

namespace App\Traits;

use App\Facades\Settings;

trait ToggleFeatures
{
  public static function shouldRegisterNavigation(): bool
  {
    Settings::load();

    return Settings::isFeatureEnabled(static::$featureFlag);
  }
}
