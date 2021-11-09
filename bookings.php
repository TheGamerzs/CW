<?php

require_once('db.php');

$sql = "SELECT id, time, pitch, userid FROM `booking`";

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

    <link rel="stylesheet" type="text/css" href="bookings.css">

</head>



<body>

    <table id="bookingsTable">

        <tbody>

            <tr>

                <th>ID</th>

                <th>Date</th>

                <th>Pitch</th>

                <th>UserID</th>

            </tr>

            <?php

            foreach ($bookings as $booking) {

                echo '<tr>

                <td>' . $booking[0] . '</td>

                <td>' . $booking[1] . '</td>

                <td>' . $booking[2] . '</td>

                <td>' . $booking[3] . '</td>

            </tr>';

            }

            ?>

        </tbody>

    </table>



    <a href="addBooking.php">Add booking</a>

    <a href="./">Home</a>

</body>



</html>