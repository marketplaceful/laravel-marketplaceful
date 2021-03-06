<?php

namespace Marketplaceful;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class Marketplaceful
{
    public static $userModel = 'App\\Models\\User';

    public static function userModel()
    {
        return static::$userModel;
    }

    public static function newUserModel()
    {
        $model = static::userModel();

        return new $model;
    }

    public static function useUserModel(string $model)
    {
        static::$userModel = $model;

        return new static;
    }

    public static function findUserByIdOrFail($id)
    {
        return static::newUserModel()::where('id', $id)->firstOrFail();
    }

    public static function findUserByEmailOrFail(string $email)
    {
        return static::newUserModel()->where('email', $email)->firstOrFail();
    }

    public static function pro()
    {
        return config('marketplaceful.pro');
    }

    public static function hasListingApprovalFeature()
    {
        return Features::hasListingApprovalFeature();
    }

    public static function formatAmount($amount, $currency = null, $locale = null)
    {
        $money = new Money($amount, new Currency(strtoupper($currency ?? config('marketplaceful.currency'))));

        $locale = $locale ?? config('marketplaceful.currency_locale');

        $numberFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

        return $moneyFormatter->format($money);
    }
}
