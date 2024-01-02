<?php
session_start(); 
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//require('ecommerce-private/product-model.php');
$totalprice = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
            align-items: center;
        
            font-family: Arial, sans-serif;
        }

        .cart-container {
            margin-top: 110px;
            width: 60%;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
        }

        .order-now-button {
            background-color: #28a745;
            color: #fff;
        }
        #return{
            margin-left: 20%;
        }
        footer{
            margin-top: 60px;
        }
    </style>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
        <a class="navbar-brand" href="home.php">ProtoType</a>
        
            <form class="form-inline w-75 mx-auto" method="get" action="home.php">
                <input class="form-control mx-auto mr-sm-2 w-50" name="search" type="search" placeholder="<?php  if(isset($_GET['search'])){echo $_GET['search'];}else{ echo 'search';} ?>" aria-label="Search">
                <input type="hidden" name="action" value="search">
                <button class="btn my-2 my-sm-0" type="submit"><img src="assets/icons/search-white.png" alt=""></button>
            </form>
       
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                
               

                <?php
                if(isset($_SESSION['user_name'])) {
                    echo " <li class='nav-item'>
                                <a class='nav-link' href='user_page.php'><i class='fas fa-user'></i><img src='assets/icons/user-white.png' class='icon'>".$_SESSION['user_name']."</a>
                            </li>";
                }else{
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='login.php'><i class='fas fa-user'></i><img src='assets/icons/enter-white.png' class='icon'>Login</a>
                        </li>";
                }
                ?>
                
            </ul>
        </div>
    </nav>


<div class="container cart-container">
    <table class="table">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Quantity</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- ////////////////-->
            <?php foreach($_SESSION['products'] as $product){  
               $totalprice += $product['price'] ?>
            <tr>
                
                <td><img src="assets/images/<?= $product['img'] ?>" alt="Item Image" style="max-width: 50px;"></td>
                <td>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        
                    </select>
                </td>
                <td><?= $product['name'] ?></td>
                <td>R$<?= $product['price'] ?></td>
                <td><button class="btn btn-sm delete-button">Delete</button></td>
            </tr>
            <?php    }    ?>
            <!--///////////// -->
        </tbody>
    </table>

    <div class="text-right">
        <p>Total Price: R$ <?=  $totalprice ?></p>
        <button class="btn order-now-button ">Order Now</button>
    </div>
    
</div>
<div class="w-100 text-left" >
<a href="javascript:history.go(-1)" id="return" class="btn btn-danger  mt-3">Return</a>
</div>

<footer class="text-center text-secondary"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>

</body>
</html>
