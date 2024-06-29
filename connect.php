<?php

// Collect form data
$name = $_POST("name");
$surname = $_POST("surname");
$adress = $_POST("adress");
$telephone = $_POST("telephone");
$e-mail = $_POST("e-mail");


$conn = new mysqli('localhost', 'root', 'formularz 1');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO 'formularz 1' (name, surname, adress, telephone, e-mail,) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $name, $surname, $adress, $telephone, $e-mail);
    $execval = $stmt->execute();
    //echo $execval;
    echo "<script type='text/javascript'>alert('Wiadomość wysłana'); window.location.href = 'homepage.php';</script>";
    // Alert o wysłaniu wiadomości
    $stmt->close();
    $conn->close();
}
?>
