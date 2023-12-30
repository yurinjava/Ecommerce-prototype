<?php 
session_start();
//echo '<pre';
//print_r($_POST);
//echo '</pre>';
//$teste_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
//echo $teste_pass;
require '../connection.php';
$connection = new Connection();
//print_r($connection);
$pdo = $connection->connect();

$email = $_POST['email'];
$stmt = $pdo->prepare("SELECT user_name, user_email, user_password FROM user WHERE user_email LIKE :email");
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);
//echo '<pre>';
//print_r($result);
//echo '</pre>';
//echo $result[0]->user_name;
$password= $_POST['password'];
$passwordhashed = $result[0]->user_password;

if($_POST['email'] == $result[0]->user_email){
   if(password_verify($password, $passwordhashed)){
      echo '<br>';
      echo 'authenticated';
      $_SESSION['authentication']=1;
      $_SESSION['user_name']=$result[0]->user_name;
      header('location: ../../home.php');
     
   }else{
      echo 'incorrenct password';
      header ('location: ../../login.php?password=incorrect');
   }
}else{
   echo 'email incorrect';
   header ('location: ../../login.php?email=incorrect');
}
print_r($_SESSION);
echo '<br>';
echo $_SESSION['user_name'];

?>

