<?php
/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github: https://github.com/dbrax
 * Email: emmanuel@opensource.co.tz
 *
 */
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
