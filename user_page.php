<?php
session_start();
if(isset($_SESSION['authentication']) && $_SESSION['authentication']==1){
//echo $_SESSION['authentication'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icons/site-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProtoType - User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/user_page.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
        <a class="navbar-brand" href="home.php">ProtoType</a>
        
            <form class="form-inline w-75 mx-auto" method="get" action="home.php">
                <input class="form-control mx-auto mr-sm-2 w-50" name="search" type="search" placeholder="<?php  if(isset($_GET['search'])){echo $_GET['search'];}else{ echo 'search';} ?>" aria-label="Search">
                <input type="hidden" name="action" value="search">
                <button class="btn my-2 my-sm-0" type="submit"><img src="assets/icons/search-white.png" alt=""></button>
            </form>
       
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i><img src="assets/icons/shopping-cart-white.png" class="icon"> Cart</a>
                </li>

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

    <div class="container ">
        <h2 class="text-center mb-4"><?php echo "Hello ".$_SESSION['user_name']."!"; ?></h2>

        <div class="row">
            <!-- Account Information Option -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Information</h5>
                        <p class="card-text">View and update your account details.</p>
                        <a href="#" class="btn btn-secondary">Go to Account</a>
                    </div>
                </div>
            </div>

            <!-- Your Purchases Option -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Purchases</h5>
                        <p class="card-text">View a history of your purchases.</p>
                        <a href="#" class="btn btn-secondary">View Purchases</a>
                    </div>
                </div>
            </div>

            <!-- Your Address Option -->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Address</h5>
                        <p class="card-text">Manage your shipping addresses.</p>
                        <a href="#" class="btn btn-secondary">Manage Addresses</a>
                    </div>
                </div>
            </div>

            <!-- Your Shopping Cart Option -->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Shopping Cart</h5>
                        <p class="card-text">View and manage items in your shopping cart.</p>
                        <a href="#" class="btn btn-secondary">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="home.php" class="btn btn-dark mt-5 mb-5">Return</a>
        <a href="ecommerce-private/login-control/logout.php" class="btn btn-danger mt-5 mb-5">Logout</a>
        <footer class="text-center text-secondary"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>
    </div>

    

</body>

</html>
<?php }else{
    header('location: login.php');
} ?>