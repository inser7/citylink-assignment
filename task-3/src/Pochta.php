<?php

namespace Delivery;

use Delivery\Contracts\DeliverCompany;

class Pochta implements DeliverCompany
{
    const MAX_PRICE = 1000;

    /**
     * @param $weight
     *
     * @return int
     */
    function cal( $weight ): int
    {
        if( $weight < 100 ) return DeliverCompany::BASE_PRICE;
        return self::MAX_PRICE;
    }
}