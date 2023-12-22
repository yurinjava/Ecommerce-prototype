<?php 
$action = "selectAlphabetical";

require 'ecommerce-private/product-controller.php';
//print_r($products);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/home.css">
    
    <title>ProtoType - home</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">ProtoType</a>
        
            <form class="form-inline w-75" >
                <input class="form-control mx-auto mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
       
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i><img src="assets/icons/shopping-cart-white.png" class="icon"> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i><img src="assets/icons/user-white.png" class="icon"> Login</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Product Listing -->

 
    <div class="container mt-5">
            <div class="row">
                <?php foreach($products as $index=>$product){ ?>
                <div class="col-md-4 mb-4 mt-4">
                    <div class="card  text-center">
                        <!-- Product Image -->
                        <img src="assets/images/<?= $product->product_img; ?>" class="product-pic  mx-auto d-block" >
                        <div class="card-body">
                            <!-- Product Title -->
                            <h5 class="card-title">
                            
                            <?= $product->product_name; ?>
                            </h5>
                            <!-- Product Price -->
                            <p class="card-text"><?= $product->product_price; ?></p>
                            <!-- Add to Cart Button -->
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Repeat similar structure for other products -->
            
    
           

            

           
           

           

            

            
        </div>
        <footer class="text-center text-secondary"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>
    </div>
    
 

    
    </body>
    </html>