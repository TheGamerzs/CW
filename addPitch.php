<?php
require_once 'include/header.php';
require_once 'include/db.php';

if (!empty($_POST)) {
    $id = $_POST['id'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    $id = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT pitchID FROM pitch";
    $results = mysqli_query($conn, $sql);

    if ($results && mysqli_num_rows($results) > 0) {
        while ($pitch = mysqli_fetch_array($results)) {
            if($pitch[0] == $id){
                echo '<p>Pitch ID already exists</p>';
            }
        }
    }


    $width = mysqli_real_escape_string($conn, $width);
    $length = mysqli_real_escape_string($conn, $length);

    $sql = "INSERT INTO pitch (pitchID, width, length) VALUES ($id, '$width', '$length')";
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
            <label for="pitch">ID:</label>
            <input type="number" name="id" />
        </div>
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