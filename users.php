<?php
require_once 'include/header.php';
require_once 'include/db.php';

$sql = "SELECT userID, username, email FROM `user`";
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
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($users as $user) {
                echo '<tr>
                <td>' . $user[0] . '</td>
                <td>' . $user[1] . '</td>
                <td>' . $user[2] . '</td>
                <td><a href="deleteUser.php?id=' . $user[0] . '">Delete</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>