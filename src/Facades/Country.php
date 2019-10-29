<?php

namespace Vinelab\Country\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string name(string $abbreviation)
 * @method static string abbreviation(string $name)
 * @method array all()
 *
 * @see \Vinelab\Country\Guide
 */
class Country extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vinelab.country';
    }
}
