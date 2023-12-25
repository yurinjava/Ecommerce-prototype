<?php 
require 'product-model.php';
require 'product-service.php';

require 'connection.php';   
   //print_R($_GET);
   
 
 
    $action = isset($_GET['action']) ? $_GET['action'] : $action;
   
    if($action=='select'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->select();
        $products = $productService->select();

    }else if($action =='selectAccessories'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectAccessories();
        $products = $productService->selectAccessories();

    }else if($action =='selectEngine'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectEngine();
        $products = $productService->selectEngine();

    }else if($action =='selectSuspension'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectSuspension();
        $products = $productService->selectSuspension();

    }else if($action =='selectBrakes'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectBrakes();
        $products = $productService->selectBrakes();

    }else if($action =='selectTools'){
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->selectTools();
        $products = $productService->selectTools();

    }else if($action =='search'){
        $tobeSearched = $_GET['search'];
        $product = new Product();
        $connection = new Connection();
        $productService = new productService($connection, $product);
        $productService->search();
        $products = $productService->search();
        //echo "<script> alert('controlelr')</script>";
        //echo $action;
    }
    
   
?>