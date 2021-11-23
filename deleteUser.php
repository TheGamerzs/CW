<?php
require_once 'include/header.php';
require_once 'include/db.php';

$id = $_GET['id'];

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT userID FROM user WHERE id = $id";
$results = mysqli_query($conn, $sql);

if ($results && mysqli_num_rows($results) == 0) {
    header("Location: users.php");
}

if (!empty($_POST)) {

    $sql = "DELETE FROM user WHERE userID = $id";

    $results = mysqli_query($conn, $sql);

    if($results) {
        header("Location: users.php");
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
        <h1>Delete User <?php echo htmlspecialchars($_GET['id'],  ENT_QUOTES, 'UTF-8'))?>?</h1>
        <div>
            <input name="del" type="submit" value="Delete" />
        </div>
    </form>

</body>

</html>