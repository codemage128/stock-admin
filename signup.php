<?php
$userName = $_POST['userName'];
$password = $_POST['password'];

$servername = "sql186.main-hosting.eu.";
$db_username = "u339440675_credencial";
$db_password = ":>V^#N7]3S9n";
//$db_username = "root";
//$db_password = "";

$databasename = "u339440675_credencial";


$conn = new mysqli($servername, $db_username, $db_password, $databasename);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO admin (username, password)
VALUES ('$userName', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: ui-login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
