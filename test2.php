<?php
include "connect.php";

$name= (isset($_POST["name"])) ? htmlspecialchars($_POST["name"]) : "";

$email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : "";

$sql = "INSERT INTO info(name, email) VALUES ('$name','$email')";
$conn-> query($sql);
 ?>
