<?php
require_once 'include/header.php';
require_once('db.php');

$sql = "SELECT userID, email FROM `user`";
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

    <table id="pitchsTable">
        <tbody>
            <tr>
                <th>ID</th>
                <th>Email</th>
            </tr>
            <?php
            foreach ($users as $user) {
                echo '<tr>
                <td>' . $user[0] . '</td>
                <td>' . $user[1] . '</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>