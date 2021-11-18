<?php
require_once 'include/header.php';
require_once 'db.php';

$id = $_GET['pitchID'];

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT pitchID FROM pitch WHERE pitchID = $id";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) == 0) {
    header("Location: pitches.php");
}

if (!empty($_POST)) {

    $sql = "DELETE FROM pitch WHERE pitchID = $id";

    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) == 1) {
        header("Location: pitches.php");
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
        <h1>Delete Pitch <?php echo $_GET['pitchID']?>?</h1>
        <div>
            <input name="del" type="submit" value="Delete" />
        </div>
    </form>

</body>

</html>