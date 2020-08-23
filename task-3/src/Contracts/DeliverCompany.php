<?php

namespace Delivery\Contracts;

/**
 * This interface is used to guarantee correct methods and arguments existing.
 *
 */
interface DeliverCompany
{
    public const BASE_PRICE = 100;


    /**
     * @param $weight
     *
     * @return int
     */
    function cal( $weight ): int;

}