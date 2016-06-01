<?php

namespace Alihann\LaravelRockid\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Rockid Facade Class
 *
 * @author Ali Han <le3han@gmail.com>
 */
class Rockid extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rockid';
    }

}