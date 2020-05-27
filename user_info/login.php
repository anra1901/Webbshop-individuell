<?php
session_start();

require_once "../config/db.php";

$email = $_POST["email"];
$password = $_POST["password"];


$sql = "SELECT * FROM webshop_users WHERE email=:email";

$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);


if(password_verify($password, $row["password"])) {
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["telephone"] = $row["telephone"];
    $_SESSION["street"] = $row["street"];
    $_SESSION["zipcode"] = $row["zipcode"];
    $_SESSION["city"] = $row["city"];
    
   header("Location: member_page.php");
} else {
    header("Location: register.php");
};

?>