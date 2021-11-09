<?php

require_once 'db.php';

if (isset($_POST['add'])) {

    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pass = $_POST['pass'];

    $email = mysqli_real_escape_string($conn, $email);
    $tel = mysqli_real_escape_string($conn, $tel);
    $pass = mysqli_real_escape_string($conn, $pass);


    $sql = "INSERT INTO `user` (`email`, `telephone`, `password`, `status`) VALUES ('$email', '$tel', '$pass', '1');";
    $request = mysqli_query($conn, $sql);

    if ($request) {
        echo '<p>User Added</p>';
    } else {
        echo '<p>User could not be added</p>';
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
            <label for="pitch">Password:</label>
            <input type="text" name="pass" id="pass">
        </div>

        <div>
            <input name="add" type="submit" value="Submit">
        </div>
    </form>

    <a href="user.php">View user</a>
    <a href="./">Home</a>

</body>



</html>