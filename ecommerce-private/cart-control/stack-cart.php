<?php 
session_start();

if(!isset( $_SESSION['authentication'])){
    header('Location: ../../login.php?loginFirts-1');
    exit();
}

if(isset($_SESSION['products'])){
    foreach ($_SESSION['products'] as $key=> $product) {
        if ($product["id"] == $_POST['product_id']) {
           unset($_SESSION['products'][$key]); // Remove the element with the matching id
           echo "<script> alert('teste') </script>";
        }
    }
}
echo '<pre>';
print_r($_POST);
echo '</pre>';


$productId = $_POST['product_id'];
$productName = $_POST['product_name'];
$productImg = $_POST['product_img'];
$productPrice = $_POST['product_price'];
$productQuantity = $_POST['product_quantity'];
// Set values for the object using the __set method
// Store the product in an array
$_SESSION['products'][] = array(
    'id'   => $productId,
    'name' => $productName,
    'price' => $productPrice,
    'img' => $productImg,
    'quantity' => null
);




//echo '<pre>';
//print_r($_SESSION['products']);
//echo '</pre>';
header('Location: ../../cart.php');
?>