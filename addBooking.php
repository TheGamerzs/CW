<?php
require_once 'include/header.php';
require_once 'db.php';

if (!empty($_POST)) {

    $pitch = $_POST['pitch'];
    $user = $_POST['user'];

    $pitch = mysqli_real_escape_string($conn, $pitch);
    $user = mysqli_real_escape_string($conn, $user);

    $sql = "INSERT INTO booking (`time`, pitch, userID) VALUES (CURDATE(), $pitch, $user)";
    $request = mysqli_query($conn, $sql);

    if ($request) {
        echo '<p>Booking Added</p>';
    } else {
        echo '<p>Booking could not be added</p>';
    }
}

$sql = "SELECT pitchID, width, `length` FROM pitch";
$results = mysqli_query($conn, $sql);

if ($results) {
    while ($pitch = mysqli_fetch_array($results)) {
        $pitches[] = $pitch;
    }
}

$sql = "SELECT userID, email FROM user";
$results = mysqli_query($conn, $sql);


if ($results) {
    while ($user = mysqli_fetch_array($results)) {
        $users[] = $user;
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
                        echo '<option value="' . $pitch[0] . '">' . $pitch[0] . ' - ' . $pitch[1] . 'x' . $pitch[2] . '</option>';
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="user">User:</label>
            <select name="user">
                <?php
                    foreach ($users as $user) {
                        echo '<option value="' . $user[0] . '">' . $user[0] . ' - ' . $user[1] . '</option>';
                    }
                ?>
            </select>
        </div>

        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

</html>