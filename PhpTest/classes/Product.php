<?php
class Product{
    protected $name;
    protected $type;
    protected $price;
    private function __construct($name, $type, $price){
        $this->$name = $name;
        $this->$type = $type;
        $this->$price = $price;
    }
}
?>