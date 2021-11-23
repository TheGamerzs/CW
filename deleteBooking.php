<?php
require_once 'include/header.php';
require_once 'include/db.php';

$id = $_GET['id'];

if(!empty($_GET['userID'])){
    $userID = $_GET['userID'];
    $userID = mysqli_real_escape_string($conn, $userID);
}

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT bookingID, start, end, pitch, userID FROM booking WHERE bookingID = $id";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) == 0) {
    header("Location: pitches.php");
}

$results = mysqli_query($conn, $sql);
$booking = mysqli_fetch_array($results);

if (!empty($_POST)) {

    $sql = "DELETE FROM booking WHERE bookingiD = $id";

    $results = mysqli_query($conn, $sql);

    if($results) {
        if($userID){
            header("Location: viewBookings.php?id=$userID");
        } else {
            header("Location: bookings.php");
        }
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
        <table id="bookingsTable" style="margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Pitch</th>
                    <th>UserID</th>
                </tr>
                <?php
                echo '<tr>
                <td>' . $booking[0] . '</td>
                <td>' . $booking[1] . '</td>
                <td>' . $booking[2] . '</td>
                <td>' . $booking[3] . '</td>
                <td>' . $booking[4] . '</td>
                </tr>';
            ?>
            </tbody>
        </table>
        <br>
        <div>
            <input name="del" type="submit" value="Delete" />
        </div>
    </form>

</body>

</html>