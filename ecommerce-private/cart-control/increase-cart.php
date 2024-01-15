<?php  
session_start();

$id= $_GET['id'];
print_r($_GET);

foreach($_SESSION['products'] as $key => $product ){
    if($product['id'] == $id ){
      $productId = $product['id'];
      $productName = $product['name'];
      $productPrice = $product['price'];
      $productImg = $product['img'];

      
        $_SESSION['products'][] = array(
            'id'   => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'img' => $productImg,
        );
        break;
    }
}
$_SESSION['products'] = array_values($_SESSION['products']);
echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';

echo '<pre>';
print_r($_SESSION['newproducts']);
echo '</pre>';
header('location: stack-cart.php');
?>