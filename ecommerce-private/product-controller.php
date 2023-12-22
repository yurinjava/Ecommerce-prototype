<?php 
require 'ecommerce-private/product-model.php';
require 'ecommerce-private/product-service.php';
require 'ecommerce-private/connection.php';

   
   
    $action = isset($_GET['action']) ? $_GET['action'] : $action;
   
    if($action=='select'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->select();
        //$productService = new productService($connection, $product);
       $products = $productService->select();

    }else if($action =='selectAlphabetical'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectAlphabetical();
        $products = $productService->selectAlphabetical();
    }
?>