<?php

namespace Vinelab\Country\Facades;

use Illuminate\Support\Facades\Facade;

class Guide extends Facade
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
