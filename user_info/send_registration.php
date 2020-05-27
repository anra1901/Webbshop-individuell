<?php
require_once "../config/db.php";
require_once "register.php";

$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];
$street = $_POST["street"];
$zipcode = $_POST["zip"];
$city = $_POST["city"];
$telephone = $_POST["phone"];
$password = password_hash($password, PASSWORD_DEFAULT); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $sql = "INSERT INTO webshop_users (name, password, email, street, zipcode, city, telephone)
    VALUES (:name, :password, :email, :street, :zipcode, :city, :telephone)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->execute();

endif;
?>