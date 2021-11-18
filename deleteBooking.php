<?php
require_once 'include/header.php';
require_once 'include/db.php';

$id = $_GET['id'];

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT bookingID FROM booking WHERE bookingID = $id";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) == 0) {
    header("Location: pitches.php");
}

if (!empty($_POST)) {

    $sql = "DELETE FROM booking WHERE bookingiD = $id";

    $results = mysqli_query($conn, $sql);

    if($results) {
        header("Location: bookings.php");
    }
}
?>

<html>

<head>
    <title>Booking Prototype</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form method="POST" style="text-align:center;">
        <h1>Delete Booking <?php echo $_GET['id']?>?</h1>
        <div>
            <input name="del" type="submit" value="Delete" />
        </div>
    </form>

</body>

</html>