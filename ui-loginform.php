<?php
session_start();
$userName = $_POST['userName'];
$password = $_POST['password'];

$servername = "sql186.main-hosting.eu";
$db_username = "u339440675_credencial";
$db_password = ":>V^#N7]3S9n";

//$servername = "localhost";
//$db_username = "root";
//$db_password = "";
$databasename = "u339440675_credencial";

// Create connection
// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $databasename);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// sql to create table
//$sql = "CREATE TABLE admin (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//username VARCHAR(30) NOT NULL,
//password VARCHAR(30) NOT NULL)";
//$conn->query($sql);

$sql = "INSERT INTO admin (username, password)
VALUES ('$userName', '$password')";


$sql = "SELECT * FROM admin where username = '".$userName."' and password = '".$password."'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $adminId = $result->fetch_object()->id;
    $_SESSION['adminId'] = $adminId;
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}else {
    $conn->close();
    header("location: ui-login.php");
    die();
}



