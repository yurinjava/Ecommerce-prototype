<?php
session_start();
if(isset($_SESSION['authentication']) && $_SESSION['authentication']==1){
//echo $_SESSION['authentication'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Web Commerce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">User Profile</h2>

        <div class="row">
            <!-- Account Information Option -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Information</h5>
                        <p class="card-text">View and update your account details.</p>
                        <a href="#" class="btn btn-primary">Go to Account</a>
                    </div>
                </div>
            </div>

            <!-- Your Purchases Option -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Purchases</h5>
                        <p class="card-text">View a history of your purchases.</p>
                        <a href="#" class="btn btn-primary">View Purchases</a>
                    </div>
                </div>
            </div>

            <!-- Your Address Option -->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Address</h5>
                        <p class="card-text">Manage your shipping addresses.</p>
                        <a href="#" class="btn btn-primary">Manage Addresses</a>
                    </div>
                </div>
            </div>

            <!-- Your Shopping Cart Option -->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Shopping Cart</h5>
                        <p class="card-text">View and manage items in your shopping cart.</p>
                        <a href="#" class="btn btn-primary">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<?php }else{
    header('location: login.php');
} ?>