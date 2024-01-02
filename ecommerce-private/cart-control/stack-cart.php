<?php 
session_start();

if(!isset( $_SESSION['authentication'])){
    header('Location: ../../login.php?loginFirts-1');
    exite();
}


echo '<pre>';
print_r($_POST);
echo '</pre>';
$productId = $_POST['product_id'];
$productName = $_POST['product_name'];
$productImg = $_POST['product_img'];
$productPrice = $_POST['product_price'];
// Set values for the object using the __set method
// Store the product in an array
$_SESSION['products'][] = array(
    'id'   => $productId,
    'name' => $productName,
    'price' => $productPrice,
    'img' => $productImg,
);

echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';
header('Location: ../../cart.php')

?>