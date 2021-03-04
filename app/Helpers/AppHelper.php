<?php


namespace App\Helpers;

use App\Models\Filials;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Collection as Collection;
use Illuminate\Support\Facades\Auth;

class AppHelper
{
    private const APP_ENV_DEVELOP = 'develop';
    private const APP_ENV_STAGING = 'staging';
    private const APP_ENV_PRODUCTION = 'production';

    /**
     * Check if current application instance is running in "develop" environment
     *
     * @return bool
     */
    public static function isDevelopEnv(): bool
    {
        return env('APP_ENV') === self::APP_ENV_DEVELOP;
    }

    /**
     * Check if current application instance is running in "develop" environment
     *
     * @return bool
     */
    public static function isStagingEnv(): bool
    {
        return env('APP_ENV') === self::APP_ENV_STAGING;
    }

    /**
     * Check if current application instance is running in "develop" environment
     *
     * @return bool
     */
    public static function isProductionEnv(): bool
    {
        return env('APP_ENV') === self::APP_ENV_PRODUCTION;
    }

     /**
     * @return int
     */
    public static function getUserCurrentFilialId():int
    {
        $current_filial = session('user_current_filial');

        return $current_filial ? $current_filial['filial_id'] : 0;
    }

    /**
     * @return string
     */
    public static function getUserCurrentFilialName():string
    {
        $current_filial = session('user_current_filial');

        return $current_filial ? $current_filial['filial_name'] : 'Все филиалы';
    }

    /**
     * @return array
     */
    public static function getFilials():array
    {
        $result = [0 => 'Все филиалы'];
        $classElements = Filials::select(['id','name'])
            ->orderBy('id', 'desc')
            ->get();
        foreach ($classElements as $element) {
            $result[$element->id] = $element->name;
        }

        return $result;
    }
}
