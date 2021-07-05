<?php

namespace Epmnzava\Beempayments;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Epmnzava\Beempayments\Skeleton\SkeletonClass
 */
class BeempaymentsFacade extends Facade
{
    
    protected static function getFacadeAccessor()
    {
        return 'beempayments';
    }
}
