<?php 
session_start();

if(!isset( $_SESSION['authentication'])){
    header('Location: ../../login.php?loginFirts-1');
    exit();
}
if(isset($_POST['product_id'])){
    unset($_SESSION['newproducts']);
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productImg = $_POST['product_img'];
    $productPrice = $_POST['product_price'];
    
    
    
    $_SESSION['products'][] = array(
        'id'   => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'img' => $productImg,
    );
}

    
      



// Assuming $_SESSION['products'] is the original array of products

// Initialize an empty array to store the new products with quantity
$newProducts = array();

// Create a temporary array to keep track of the product counts
$productCounts = array();

// Loop through the original array to count the occurrences of each product
foreach ($_SESSION['products'] as $product) {
    $productId = $product['id'];

    // Check if the product id is already in the productCounts array
    if (array_key_exists($productId, $productCounts)) {
        // Increment the count if the product id is already present
        $productCounts[$productId]++;
    } else {
        // Initialize the count to 1 if the product id is not present
        $productCounts[$productId] = 1;
    }
}

// Loop through the original array again to create the new array with quantity
foreach ($_SESSION['products'] as $product) {
    $productId = $product['id'];
    $productName = $product['name'];
    $productPrice = $product['price'];
    $productImg = $product['img'];
    // Check if the product id has already been added to newProducts
    if (!isset($newProducts[$productId])) {
        // Get the quantity from the productCounts array
        $quantity = $productCounts[$productId];

        // Create a new product array with quantity attribute
        $newProduct = array(
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $quantity,
            'img' => $productImg
        );

        // Add the new product to the newProducts array
        $newProducts[$productId] = $newProduct;
    }
}

// Now $newProducts contains the desired array with quantity attribute for each unique product
$newProducts = array_values($newProducts); // Reset array keys if needed


//echo '<pre>';
//print_r($newProducts);
//echo '</pre>';
// Now $newProducts contains the desired array with quantity attribute for each product



$_SESSION['newproducts'] = $newProducts;
echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';
echo '<pre>';
print_r($_SESSION['newproducts']);
echo '</pre>';
header('location: ../../cart.php');
?>




