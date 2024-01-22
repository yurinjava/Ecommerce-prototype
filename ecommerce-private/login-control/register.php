<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

require '../connection.php';

$connection = new Connection();
$pdo = $connection->connect();


$completeName = $_POST['nomeCompleto'];
$email = $_POST['email'];
$password = password_hash($_POST['senha'], PASSWORD_BCRYPT);
$cep = $_POST['cep'];
$address = $_POST['endereco'];
$number = $_POST['numero'];
$complement = $_POST['complemento'];
$uf = $_POST['uf'];
$district = $_POST['bairro'];
$city = $_POST['cidade'];

$stmt = $pdo->prepare("INSERT INTO user (user_email, user_name, user_password) VALUES (?, ?, ?)");

$stmt->bindParam(1, $email);
$stmt->bindParam(2, $completeName);
$stmt->bindParam(3, $password);
$stmt->execute();

$lastInsertedId = $pdo->lastInsertId();

// Output the result
// $lastInsertedId;

$stmt = $pdo->prepare("INSERT INTO address (address_cep, address_street, address_number, address_complement, address_city, address_state, address_district, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bindParam(1, $cep);
$stmt->bindParam(2, $address);
$stmt->bindParam(3, $number);
$stmt->bindParam(4, $complement);
$stmt->bindParam(5, $city);
$stmt->bindParam(6, $uf);
$stmt->bindParam(7, $district);
$stmt->bindParam(8, $lastInsertedId);

$stmt->execute();

header('location: ../../login.php?insert=1')
?>