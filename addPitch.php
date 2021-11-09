<?php

require_once 'db.php';

if (isset($_POST['add'])) {
    $size = $_POST['size'];

    $size = mysqli_real_escape_string($conn, $size);

    $sql = "INSERT INTO pitch (size) VALUES ('$size')";
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
            <label for="pitch">Size:</label>
            <input type="text" name="size" />
        </div>

        <div>
            <input name="add" type="submit" value="Submit" />
        </div>
    </form>

    <a href="pitches.php">View Picthes</a>

    <a href="./">Home</a>
</body>

</html>