
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ProtoType - Login</title>
    <link rel="icon" href="assets/icons/site-icon.png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php 


if(isset($_GET['email']) && $_GET['email'] == 'incorrect'){
    echo'    
    <div  id="alert">
    <p class="mb-4">Email incorrect!</p>
    <a class="btn btn-primary" onclick="displaynt()" >Got it!</a>
</div>';
};
if(isset($_GET['password']) && $_GET['password'] == 'incorrect'){
    echo'    
    <div  id="alert2">
    <p class="mb-4">Password incorrect!</p>
    <a class="btn btn-primary" onclick="displaynt2()" >Got it!</a>
</div>';
};

if(isset($_GET['loginFirst']) && $_GET['loginFirst'] ==1){
    echo'    
    <div  id="alert3">
    <p class="mb-4">You must be logged in before adding items to your cart!</p>
    <a class="btn btn-primary" onclick="displaynt3()" >Got it!</a>
</div>';
}
?>
    <script>
       
        function displaynt(){
            let alert = document.getElementById('alert');
            alert.style.display = "none";
        }
        function displaynt2(){
            let alert = document.getElementById('alert2');
            alert.style.display = "none";
        }
        function displaynt3(){
            let alert = document.getElementById('alert3');
            alert.style.display = "none";
        }
    </script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
                #alert, #alert2 {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text color */
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999; /* Set a high z-index value to ensure the div appears in front of everything */
            display: block;
        }
             #alert3 {
            background-color: #AFE1AF; 
            color: #4F7942; 
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999; /* Set a high z-index value to ensure the div appears in front of everything */
            display: block;
        }
        .login-form {
            width: 300px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .quote {
            text-align: center;
            color: #6c757d;
        }

        .logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<img src="assets/icons/logo.png" alt="Logo" class="logo">

<div class="login-form">
    <h2 class="login-title">Logon</h2>
    <form  method="post" action="ecommerce-private/login-control/logon-validation.php">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <a href="home.php" class="btn btn-danger w-25">return</a>
        <button type="submit" class="btn btn-primary w-50">Log In</button>
        
    </form>
    <p class="quote">First time? <a href="create-account.php">Create your account.</a></p>
</div>
<footer class="text-center text-secondary"> <p>© 2023 ProtoType. All Rights Reserved.</p></footer>
</body>
</html>
