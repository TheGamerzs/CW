<?php
require_once 'include/header.php';
require_once 'include/db.php';

if (!empty($_POST)) {

    if(!empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) {

        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        $email = mysqli_real_escape_string($conn, $email);
        $tel = mysqli_real_escape_string($conn, $tel);
        $username = mysqli_real_escape_string($conn, $username);
        $pass = mysqli_real_escape_string($conn, $pass);

        if ($pass == $pass2) {
            $pass = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 14]);
            $sql = "INSERT INTO `user` (`email`, `username`, `telephone`, `password`, `status`) VALUES ('$email', '$username', '$tel', '$pass', '1');";


            $request = mysqli_query($conn, $sql);
            if ($request) {
                echo '<p>User Added</p>';
            } else {
                echo '<p>User could not be added</p>';
            }
        } else {
            echo '<p>Passwords do not match</p>';
        }
    } else {
        echo '<p>User not validated</p>';
    }
}
?>

<html>

<head>
    <title>Booking Prototype</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form method="POST">
        <div>
            <label for="pitch">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="pitch">Telephone:</label>
            <input type="text" name="tel" id="tel">
        </div>
        <div>
            <label for="pitch">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="pitch">Password:</label>
            <input type="text" name="pass" id="pass">
        </div>
        <div>
            <label for="pitch">Confirm Password:</label>
            <input type="text" name="pass2" id="pass2">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>

</html>