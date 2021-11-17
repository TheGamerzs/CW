<?php
require_once 'include/header.php';
require_once 'db.php';

if (!empty($_POST)) {
    $width = $_POST['width'];
    $length = $_POST['length'];

    $width = mysqli_real_escape_string($conn, $width);
    $length = mysqli_real_escape_string($conn, $length);

    $sql = "INSERT INTO pitch (width, length) VALUES ('$width', '$length')";
    $request = mysqli_query($conn, $sql);

    if ($request) {
        echo '<p>Pitch Added</p>';
    } else {
        echo '<p>Pitch could not be added</p>';
    }

}

?>

<html>

<head>
    <title>Booking Prototype</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

    <form method="POST">
        <div>
            <label for="pitch">Width:</label>
            <input type="number" name="width" />
        </div>
        <div>
            <label for="pitch">Length:</label>
            <input type="number" name="length" />
        </div>

        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
</body>

</html>