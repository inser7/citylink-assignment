<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Delivery\Pochta;


class PochtaTest extends TestCase
{
    private $pochta;


    protected function setUp()
    {
        $this->pochta = new Pochta();
    }


    public function testCalc100()
    {
        $price = $this->pochta->calc( 5 );

        $this->assertIsInt( $price );
        $this->assertEquals( 100, $price );

    }


    public function testCalc1000()
    {
        $price = $this->pochta->calc( 120 );

        $this->assertIsInt( $price );
        $this->assertEquals( 1000, $price );

    }
}