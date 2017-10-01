<?php
namespace DevMarketer\LaraMongo;
/**
 * This file is part of LaraMongo Package,
 * Laravel wrapper for the Mongo PHP Library.
 *
 * @license MIT
 * @package LaraMongo
 */

use Illuminate\Support\Facades\Facade;

class MongoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laramongo';
    }
}
