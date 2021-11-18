<?php
require_once 'include/header.php';
require_once 'include/db.php';

$sql = "SELECT pitchID, width, `length` FROM `pitch`";
$results = mysqli_query($conn, $sql);

$pitchs = [];

if ($results) {
    while ($pitch = mysqli_fetch_array($results)) {
        $pitchs[] = $pitch;
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
                <th>Width</th>
                <th>Length</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($pitchs as $pitch) {
                echo '<tr>
                <td>' . $pitch[0] . '</td>
                <td>' . $pitch[1] . '</td>
                <td>' . $pitch[2] . '</td>
                <td><a href="deletePitch.php?pitchID=' . $pitch[0] . '">Delete</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>