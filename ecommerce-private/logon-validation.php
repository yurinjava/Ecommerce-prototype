<?php 
echo '<pre';
print_r($_POST);
echo '</pre>';
$password_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
echo $password_hashed;
?>