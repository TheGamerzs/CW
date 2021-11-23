<?php
require_once 'include/header.php';
require_once 'include/db.php';

$id = $_GET['id'];

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT bookingID, start, end, pitch, userID FROM `booking` WHERE userId = $id";
$results = mysqli_query($conn, $sql);
$bookings = [];

if (mysqli_num_rows($results) == 0) {
    echo '<p>No bookings found</p>';
} else {
    while ($booking = mysqli_fetch_array($results)) {
        $bookings[] = $booking;
    }
}

if ($results) {
    while ($booking = mysqli_fetch_array($results)) {
        $bookings[] = $booking;
    }
}

$sql = "SELECT username FROM user WHERE userID = $id";
$results = mysqli_query($conn, $sql);

$username = mysqli_fetch_array($results)[0];

?>

<html>

<head>
    <title>Booking Prototype</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <h1><?php echo $username; ?>'s Bookings</h1>

    <table id="bookingsTable">
        <tbody>
            <tr>
                <th>ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pitch</th>
                <th>UserID</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($bookings as $booking) {
                echo '<tr>
                <td>' . $booking[0] . '</td>
                <td>' . $booking[1] . '</td>
                <td>' . $booking[2] . '</td>
                <td>' . $booking[3] . '</td>
                <td>' . $booking[4] . '</td>
                <td><a href="deleteBooking.php?id=' . $booking[0] . '&userID=' . $id . '">Delete</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>