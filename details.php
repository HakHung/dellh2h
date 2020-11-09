<?php
echo "Hi";
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "delldb";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$userid = 1;
$eventid = $_GET['var'];
echo $eventid;

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "INSERT INTO user_event (userid, eventid) values ('$userid', '$eventid')";
    if ($conn->query($sql)) {
        echo "New record is inserted sucessfully";
        include('details.html');

    } else {
        "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();