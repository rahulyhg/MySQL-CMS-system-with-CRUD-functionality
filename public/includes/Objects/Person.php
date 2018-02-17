<?php

class Person {
    //put your code here
    public $id;
    public $name;
    public $position;
    public $salary;
    public $address;
    public $date;
    public $image;
    public $hours;
    
    function __construct($id, $name, $position, $salary, $address, $date, $image, $hours) {
        $this->id       = $id;
        $this->name     = $name;
        $this->position = $position;
        $this->salary   = $salary;
        $this->address  = $address;
        $this->date  	= $date;
        $this->image    = $image;
        $this->hours   	= $hours;
    }

}

?>