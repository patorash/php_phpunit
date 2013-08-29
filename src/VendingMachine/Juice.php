<?php
/**
 * Created by IntelliJ IDEA.
 * User: toyoaki
 * Date: 2013/08/29
 * Time: 20:24
 * To change this template use File | Settings | File Templates.
 */

namespace VendingMachine;


abstract class Juice {
    /**
     * @var String
     */
    private $name;

    /**
     * @var int
     */
    private $price;

    protected function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return String
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice() {
        return $this->price;
    }
}