<?php
echo "Hi";
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "delldb";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$userid = 003;
$username = 'Xuan';
$eventid = $_GET['eventid'];
$contribute = 2;

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "INSERT INTO userevent (userid, username, eventid, contribute) values ('$userid','$username', '$eventid','$contribute')";
    if ($conn->query($sql)) {
        echo "New record is inserted sucessfully";
        include('details.html');

    } else {
        "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();