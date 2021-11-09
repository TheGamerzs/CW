<?php
$conn = new mysqli("localhost", "root", "", "test");
if(mysqli_connect_error()){
    die("Database connection failed: ". mysqli_connect_error());
}
?>