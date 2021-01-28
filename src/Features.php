<?php

namespace Marketplaceful;

use Illuminate\Support\Arr;

class Features
{
    protected static $featureOptions = [];

    public static function enabled(string $feature)
    {
        return in_array($feature, config('marketplaceful.features', []));
    }

    public static function optionEnabled(string $feature, string $option)
    {
        return static::enabled($feature) &&
               Arr::get(static::$featureOptions, $feature.'.'.$option) === true;
    }

    public static function hasListingApprovalFeature()
    {
        return static::enabled(static::listingApproval());
    }

    public static function authentication()
    {
        return 'authentication';
    }

    public static function settings()
    {
        return 'settings';
    }

    public static function listingApproval()
    {
        return 'listing-approval';
    }
}
