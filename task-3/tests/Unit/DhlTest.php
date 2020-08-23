<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Delivery\Dhl;


class DhlTest extends TestCase
{
    public function testCalc()
    {
        $dhl   = new Dhl();
        $price = $dhl->calc( 5 );

        $this->assertIsInt( $price );
        $this->assertEquals( 500, $price );

    }
}