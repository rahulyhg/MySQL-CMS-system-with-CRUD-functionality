<?php

class Company {
    //put your code here
    public $id;
    public $name;
    public $address;
    public $revenue;
    public $expenses;
    
    function __construct($id, $name, $address, $revenue, $expenses) {
        $this->id           = $id;
        $this->name         = $name;
        $this->address      = $address;
        $this->revenue      = $revenue;
        $this->expensess    = $expenses;
    }

}

?>