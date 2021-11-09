<?php
require_once('db.php');

$sql = "SELECT pitchid, size FROM `pitch`";
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
                <th>Size</th>
            </tr>
            <?php
            foreach ($pitchs as $pitch) {
                echo '<tr>
                <td>' . $pitch[0] . '</td>
                <td>' . $pitch[1] . '</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>