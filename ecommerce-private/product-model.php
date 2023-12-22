<?php


class Product{
    private $id;
    private $image;
    private $name;
    private $price;

    public function __get($attribute){
        return $this->$attribute;
    }
    public function __set($attribute, $value){
        $this->$attribute = $value;
        return $this;
    }
}
?>