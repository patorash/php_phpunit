<?php
/**
 * Created by IntelliJ IDEA.
 * User: toyoaki
 * Date: 2013/08/29
 * Time: 2:05
 * To change this template use File | Settings | File Templates.
 */

namespace VendingMachine;


class VendingMachine {
    /**
     * @var int
     */
    private $total = 0;

    /**
     * @var array
     */
    private $stock = array();

    /**
     * @var String
     */
    private $juiceName;

    /**
     * @var int
     */
    private $juicePrice;

    /**
     * @var int
     */
    private $amount = 0;

    public function __construct() {
        $cola = new Cola();
        $this->juiceName = $cola->getName();
        $this->juicePrice = $cola->getPrice();
        for($i=0; $i<5; $i++) {
            array_push($this->stock, new Cola());
        }
    }

    public function getTotal() {
        return $this->total;
    }

    public function putMoney($money) {
        switch($money) {
            case 10:
            case 50:
            case 100:
            case 500:
            case 1000:
                $this->total += $money;
                return true;

            default:
                $this->showChange($money);
                return false;
        }
    }

    public function returnChange() {
        $this->showChange($this->getTotal());
    }

    public function showChange($money) {
        echo "お釣り: {$money}円";
    }

    public function getStock() {
        return $this->stock;
    }

    public function getJuiceName() {
        return $this->juiceName;
    }

    public function getJuicePrice() {
        return $this->juicePrice;
    }

    public function getStockCount() {
        return count($this->getStock());
    }

    public function purchasable() {
        return ($this->getTotal() >= $this->getJuicePrice());
    }

    public function purchase() {
        if ($this->purchasable()) {
            $this->total -= $this->getJuicePrice();
            $this->amount += $this->getJuicePrice();
            array_pop($this->stock);
        }
    }

    public function getAmount() {
        return $this->amount;
    }
}