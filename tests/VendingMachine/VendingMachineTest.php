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

    /**
     * @test
     */
    public function コーラが5本入っていること(){
        $this->assertCount(5, $this->vendingMachine->getStock());
    }

    /**
     * @test
     */
    public function ジュースの名前がわかること() {
        $this->assertEquals('コーラ', $this->vendingMachine->getJuiceName());
    }

    /**
     * @test
     */
    public function ジュースの値段がわかること() {
        $this->assertEquals(120, $this->vendingMachine->getJuicePrice());
    }

    /**
     * @test
     */
    public function 在庫の数がわかること() {
        $this->assertEquals(5, $this->vendingMachine->getStockCount());
    }

    /**
     * @test
     */
    public function コーラが買えるかどうか確認できること() {
        $this->assertFalse($this->vendingMachine->purchasable());
        $this->vendingMachine->putMoney(500);
        $this->assertTrue($this->vendingMachine->purchasable());
    }

    /**
     * @test
     */
    public function コーラを買ったら在庫が減ること() {
        $this->vendingMachine->putMoney(500);
        $this->assertCount(5, $this->vendingMachine->getStock());
        $this->vendingMachine->purchase();
        $this->assertCount(4, $this->vendingMachine->getStock());
    }

    /**
     * @test
     */
    public function コーラを買ったら売上が増えていること() {
        $this->vendingMachine->putMoney(500);
        $this->vendingMachine->purchase();
        $this->assertEquals(120, $this->vendingMachine->getAmount());
    }

    /**
     * @test
     */
    public function コーラを買えない場合何もしないこと() {
        $this->vendingMachine->putMoney(100);
        $this->vendingMachine->purchase();
        $this->assertEquals(0, $this->vendingMachine->getAmount());
        $this->assertEquals(100, $this->vendingMachine->getTotal());
        $this->assertCount(5, $this->vendingMachine->getStock());
    }

    /**
     * @test
     */
    public function コーラを買ったら投入金額が減ること() {
        $this->vendingMachine->putMoney(500);
        $this->vendingMachine->purchase();
        $this->assertEquals(380, $this->vendingMachine->getTotal());
    }

}