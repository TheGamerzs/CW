<?php
require_once 'include/header.php';
require_once 'include/db.php';

$sql = "SELECT bookingID, start, end, pitch, userID FROM `booking`";
$results = mysqli_query($conn, $sql);
$bookings = [];

if ($results) {
    while ($booking = mysqli_fetch_array($results)) {
        $bookings[] = $booking;
    }
}
?>

<html>

<head>
    <title>Booking Prototype</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

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
                <td><a href="deleteBooking.php?id=' . $booking[0] . '">Delete</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>