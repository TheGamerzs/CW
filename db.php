<?php
$conn = new mysqli("lovalhost","root", "", "test");
if(mysqli_connect_error()){
    die("Database connection failed: ". mysqli_connect_error());
}
?>