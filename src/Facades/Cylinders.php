<?php

namespace nanofab\cylinders\Facades;

use Illuminate\Support\Facades\Facade;

class Cylinders extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cylinders';
    }
}
