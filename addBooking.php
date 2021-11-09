<?php

require_once 'db.php';

if (isset($_POST['add'])) {

    $pitch = $_POST['pitch'];
    $user = $_POST['user'];

    $pitch = mysqli_real_escape_string($conn, $pitch);
    $user = mysqli_real_escape_string($conn, $user);

    $sql = "INSERT INTO booking (`time`, pitch, userid) VALUES (CURDATE(), $pitch, $user)";
    $request = mysqli_query($conn, $sql);

    if ($request) {
        echo '<p>Booking Added</p>';
    } else {
        echo '<p>Booking could not be added</p>';
    }
}

$sql = "SELECT pitchid FROM pitch";
$request = mysqli_query($conn, $sql);

$bookings = [];

if ($results) {
    while ($pitch = mysqli_fetch_array($results)) {
        $pitches[] = $pitch;
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
            <label for="pitch">Pitch:</label>
            <select name="pitch">
                <?php
                foreach ($pitches as $pitch) {
                    echo '<option value="' . $pitch['pitchid'] . '">' . $pitch['pitchid'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div>

            <label for="user">User:</label>
            <select name="user">
                <option value="456">456</option>
                <option value="785">785</option>
                <option value="786">786</option>
                <option value="1024">1024</option>
                <option value="2048">2048</option>
            </select>
        </div>

        <div>
            <input name="add" type="submit" value="Submit">
        </div>
    </form>

    <a href="bookings.php">View bookings</a>
    <a href="./">Home</a>

</body>



</html>