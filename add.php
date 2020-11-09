<?php

$eventname = filter_input(INPUT_POST, 'eventname');
$datepicker = filter_input(INPUT_POST, 'datepicker');
$appt = filter_input(INPUT_POST, 'appt');
$appt1 = filter_input(INPUT_POST, 'appt1');
$venue = filter_input(INPUT_POST, 'venue');
$description = filter_input(INPUT_POST, 'description');

if($_POST["eventcategory"] == "Training"){
    $eventcategory = "Training";
}else{
    $eventcategory = "Other Events";
}

if($_POST["eventtype"] == "Workshop"){
    $eventtype = "Workshop";
}else if($_POST["eventtype"] == "Webminar"){
    $eventtype = "Webminar";
}else if($_POST["eventtype"] == "Team Building"){
    $eventtype = "Team Building";
}else {
    $eventtype = "Volunteering";
}

if($_POST["compulsory"]== "Yes"){
    $compulsory = "Yes";
}else{
    $compulsory = "No";
}

if (!empty($eventname || !empty($date))) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "delldb";
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO event_table (eventcategory, eventtype, eventname, datepicker, appt, appt1, venue, description, compulsory) values ('$eventcategory','$eventtype', '$eventname','$datepicker', '$appt', '$appt1', '$venue', '$description', '$compulsory')";
            if ($conn->query($sql)) {
                echo "New record is inserted sucessfully";
                include('training.php');

            } else {
                echo "Error: " . $sql . 
                $conn->error;
            }
        }

} else {
    echo "Event name should not be empty";
    die();
}

