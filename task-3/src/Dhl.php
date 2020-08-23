<?php

namespace Delivery;

use Delivery\Contracts\DeliverCompany;

class Dhl implements DeliverCompany
{


    /**
     * @param $weight
     *
     * @return int
     */
    function calc( $weight ): int
    {
        return $weight * DeliverCompany::BASE_PRICE;
    }
}