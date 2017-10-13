<?php
include "connect.php";
$name= $_POST["name"];
echo $_POST["name"];
$email = $_POST["email"];
$sql = "INSERT INTO info(name, email) VALUES ('$name','$email')";
$conn-> query($sql);
 ?>
