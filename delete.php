<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM users Where id=$id";
$connection->query($sql);


header("location: /practice/index.php");
exit;
?>