<?php

use VendingMachine\Cola;


class ColaTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Cola
     */
    private $cola;

    public function setUp() {
        $this->cola = new Cola();
    }

    /**
     * @test
     */
    public function 名前がコーラである事() {
        $this->assertEquals('コーラ', $this->cola->getName());
    }

    /**
     * @test
     */
    public function 値段が120円であること() {
        $this->assertEquals(120, $this->cola->getPrice());
    }
}