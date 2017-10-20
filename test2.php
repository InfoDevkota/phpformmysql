<?php

include "./connect.php";

$name = $_POST['name'];
$email = $_POST["email"];

try {
    $sql = "INSERT INTO info(name, email) VALUES ('$name', '$email')";

    $conn->query($sql);

    echo "Record inserted. Name: $name | Email: $email";
    
} catch (PDOException $e) {
    die($e->getMessage());
}
