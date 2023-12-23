<?php 
$action = "select";

require 'ecommerce-private/product-controller.php';
//echo '<pre>';
//print_r($products);
//echo '</pre>';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="icon" href="assets/icons/site-icon.png">
    
    <title>ProtoType - home</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
        <a class="navbar-brand" href="home.php">ProtoType</a>
        
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
    <nav class=" text-center navbar-expand-lg navbar-dark bg-dark fixed-top mb-5 pt-1" id="secondnav">
       
        
       
        <div class="d-inline">
            <ul class="list-inline">
                <li class="list-inline-item mr-5"><a href="home.php?action=selectEngine" class="navlink">Motor</a></li>
                <li class="list-inline-item  mr-5"><a href="home.php?action=selectSuspension" class="navlink">Suspensoes</a></li>
                <li class="list-inline-item  mr-5"><a href="home.php?action=selectAccessories" class="navlink">Acessorios</a></li>
                <li class="list-inline-item mr-5"><a href="home.php?action=selectBrakes" class="navlink">Freios</a></li>
                <li class="list-inline-item mr-5"><a href="home.php?action=selectTools" class="navlink">Ferramentas</a></li>
            </ul>
        </div>
    </nav>
   
    <!-- Product Listing -->

 
    <div class="container ">
    <div class="dropdown" id="filter">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Order by
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Lowest price</a>
    <a class="dropdown-item" href="#">highest price</a>
    <a class="dropdown-item" href="#">Relevance</a>
  </div>
</div>
    
            <div class="row">
                <?php 
                 if(isset($products)){
                   
                 
                foreach($products as $index=>$product){ ?>
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
                            <p class="card-text">R$ <?= $product->product_price; ?></p>
                            <!-- Add to Cart Button -->
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } }else{
                echo "<div class='card mx-auto text-center mt-5'><h1>nenhum produto encontrado</h1></div>";
            } ?>
            <!-- Repeat similar structure for other products -->
            
    
           

            

           
           

           

            

            
        </div>
        <footer class="text-center text-secondary"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>
    </div>
    
 

    
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    </html>