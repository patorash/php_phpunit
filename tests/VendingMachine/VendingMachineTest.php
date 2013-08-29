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

    /**
     * @test
     */
    public function 投入金額の総計を取得できる() {
        $moneys = [10, 50, 100, 500, 1000];
        foreach($moneys as $money) {
            $this->vendingMachine->putMoney($money);
        }
        $this->assertEquals(1660, $this->vendingMachine->getTotal());
    }

    /**
     * @test
     */
    public function 払い戻し動作を行うと投入金額の総計を釣り銭として出力する() {
        $moneys = [10, 50, 100, 500, 1000];
        foreach($moneys as $money) {
            $this->vendingMachine->putMoney($money);
        }
        $this->expectOutputString("お釣り: 1660円");
        $this->vendingMachine->returnChange();
    }

    public function putInvalidMoney($invalidMoney){
        $this->expectOutputString("お釣り: {$invalidMoney}円");
        $this->vendingMachine->putMoney($invalidMoney);
    }

    /**
     * @test
     */
    public function 扱えないお金1円が投入された場合は釣り銭としてユーザに出力する() {
        $this->putInvalidMoney(1);
    }

    /**
     * @test
     */
    public function 扱えないお金5円が投入された場合は釣り銭としてユーザに出力する() {
        $this->putInvalidMoney(5);
    }

    /**
     * @test
     */
    public function 扱えないお金2000円が投入された場合は釣り銭としてユーザに出力する() {
        $this->putInvalidMoney(2000);
    }

    /**
     * @test
     */
    public function 扱えないお金5000円が投入された場合は釣り銭としてユーザに出力する() {
        $this->putInvalidMoney(5000);
    }

    /**
     * @test
     */
    public function 扱えないお金10000円が投入された場合は釣り銭としてユーザに出力する() {
        $this->putInvalidMoney(10000);
    }
}