<?php

    $eventname = filter_input(INPUT_POST, 'eventname');
    $datepicker = filter_input(INPUT_POST, 'datepicker');
    $appt = filter_input(INPUT_POST, 'appt');
    $appt1 = filter_input(INPUT_POST, 'appt1');
    $venue = filter_input(INPUT_POST, 'venue');


    if($_POST["eventcategory"] == "Training"){
        $eventcategory = "Training";
    }else{
        $eventcategory = "Other Events";
    }

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "delldb";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
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
                $sql = "INSERT INTO event_table (eventcategory, eventtype, eventname, datepicker, appt, appt1, venue, description, compulsory, contribution) values ('$eventcategory','$eventtype', '$eventname','$datepicker', '$appt', '$appt1', '$venue', '$description', '$compulsory',(SELECT TIMEDIFF(appt1,appt) FROM event_table))";
                if ($conn->query($sql)) {
                    echo "New record is inserted sucessfully";
                    include('training.php');

                } else {
                    "Error: " . $sql . "<br>" . $conn->error;
                }
            }

if ($_POST["compulsory"] == "Yes") {
    $compulsory = "Yes";

} else {
    $compulsory = "No";
}

    $sql = "INSERT INTO event_table (eventcategory, eventtype, eventname, datepicker, appt, appt1, venue, description, compulsory) values ('$eventcategory','$eventtype', '$eventname','$datepicker', '$appt', '$appt1', '$venue', '$description', '$compulsory')";
    if ($conn->query($sql)) {
        echo "New record is inserted sucessfully";
        if($compulsory=="Yes"){
            $sql = "SELECT MAX(eventid) AS max_eventid FROM event_table";  //  get the eventID of newly inserted
            $eventIdLatest = $conn->query($sql);
            $row = $eventIdLatest ->fetch_array();
            echo $row["max_eventid"];
            $id = $row["max_eventid"];
            // while($row = $eventIdLatest->fetch_assoc()){
            //     echo  $row['eventid'];
            // }
            // echo  $eventIdLatest;
            
            $sql = "SELECT userid FROM usertable";
            $alluser =  $conn->query($sql);

            while($row = $alluser->fetch_assoc()){
                // echo  $eventIdLatest;
                //$sql = "SELECT event_table.eventid FROM event_table, user_event WHERE eventid="+$eventId;
               // $result1 = $conn->query($sql);
                $sql = "INSERT INTO user_event(userid, eventid) values (".$row['userid'].",".$id.")";
                $conn->query($sql);
            }
        }
        include('training.php');
        // $sql = "SELECT MAX eventid FROM event_table"
    } else {
        "Error: " . $sql . "<br>" . $conn->error;
    }

