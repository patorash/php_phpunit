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
    private $total = 0;

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
}