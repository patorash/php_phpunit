<?php
/**
 * Created by IntelliJ IDEA.
 * User: toyoaki
 * Date: 2013/08/29
 * Time: 20:28
 * To change this template use File | Settings | File Templates.
 */

namespace VendingMachine;


class Cola extends Juice {
    public function __construct() {
        parent::__construct('コーラ', 120);
    }
}