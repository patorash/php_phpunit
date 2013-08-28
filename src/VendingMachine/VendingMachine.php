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

    public function putMoney($coin) {
        $this->total += $coin;
        return true;
    }
}