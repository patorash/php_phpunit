<?php

use VendingMachine\VendingMachine;


class VendingMachineTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var VendingMachine
     */
    private $vendingMachine;

    public function setUp() {
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * @test
     */
    public function 特定のお金を入れる事ができる() {
        $moneys = [10, 50, 100, 500, 1000];
        foreach($moneys as $money) {
            $this->assertTrue($this->vendingMachine->putMoney($money));
        }
    }
}