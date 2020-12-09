<?php

namespace Tsekka\DataLoader;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tsekka\DataLoader\Skeleton\SkeletonClass
 */
class DataLoaderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'data-loader';
    }
}
