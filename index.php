<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="css/templatemo-style.css" rel="stylesheet">

    <style>
        body {
            height: 1000px;
        }

        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">ITDP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="training.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">ACCOUNT</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><small>Logout</small></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;  margin:20px;">
        <div class="row">
            <!-- <div class="col-sm-12 col-md-12 col-xs-12"> -->
                <h5><img src="profile.png" class="rounded-circle" alt="Profile Picture" width="100" style="padding:0px 10px;">Welcome! Katie Belles</h5>
            <!-- </div> -->
        </div>
    </div>

    

    <div class="container-fluid " style="padding-left: 5%; padding-right: 5%;">
        <div class="alert alert-danger text-center">
            <strong>IMPORTANT ANNOUNCEMENT!!</strong><br>WORK FROM HOME (WFH) Effective from 27th October - 9th
            November 2020
        </div>
        
        <div class='container-fluid'>
            <h4><b> 2nd Quarter (Oct - Dec)</b></h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-1">
                        <div class="card-body">
                            <b class="h6">TRAINING</b>
                            <hr class="bg-info" />
                            <div class="progress" style="height: 27px;">
                            <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "delldb";
                                
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                
                                    if($conn->connect_error){
                                        die("Connection failed: " .$conn->connect_error);
                                    }

                                    date_default_timezone_set("Asia/Kuala_Lumpur");
                                    $date = date('Y-m-d');

                                    $sql = "SELECT SUM(user_event.contribution) AS THour, HOUR(SUM(user_event.contribution)) AS Hr, MINUTE(SUM(user_event.contribution)) AS Min
                                            FROM event_table, user_event
                                            WHERE event_table.datepicker<='$date' AND event_table.eventcategory ='training' AND event_table.eventid = user_event.eventid AND userid=1
                                            ORDER BY event_table.datepicker";
                                    
                                    $result = $conn->query($sql);                    

                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $percentage = $row['THour']/100000*100;
                                            
                                            if ($percentage > 100){
                                                echo"<div class='progress-bar bg-warning' style='width:".$percentage."%; min-width:20px'>You reach the Goal!!</div>";
                                            }
                                            elseif($percentage == 0){
                                                echo"<div class='progress-bar' style='width:0%; min-width:0px'></div>";
                                            }
                                            else{
                                                echo"<div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width:".$percentage."%; min-width:20px'>".$percentage."%</div>";
                                                // echo "<p>".$row['Hr']." hours ".$row['Min']." minutes</p>";
                                            }
                                        }
                                    }
                                    
                                    $conn->close();

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-1">
                        <div class="card-body">
                            <b class="h6">OTHER EVENTS</b>
                            <hr class="bg-info" />
                            <div class="progress" style="height: 27px;">
                            <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "delldb";
                                
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                
                                    if($conn->connect_error){
                                        die("Connection failed: " .$conn->connect_error);
                                    }
                                    
                                    date_default_timezone_set("Asia/Kuala_Lumpur");
                                    $date = date('Y-m-d');
                                    $sql = "SELECT SUM(user_event.contribution) AS THour, HOUR(SUM(user_event.contribution)) AS Hr, MINUTE(SUM(user_event.contribution)) AS Min
                                            FROM event_table, user_event
                                            WHERE  event_table.datepicker<='$date' AND event_table.eventcategory ='other events' AND event_table.eventid = user_event.eventid AND userid=1
                                            ORDER BY datepicker";
                                    
                                    $result = $conn->query($sql);                    

                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $percentage = $row['THour']/100000*100;

                                            // echo $row['THour'];
                                            
                                            if ($percentage > 100){
                                                echo"<div class='progress-bar bg-warning' style='width:".$percentage."%; min-width:20px'>You reach the Goal!!</div>";
                                            }
                                            elseif($percentage == 0){
                                                echo"<div class='progress-bar' style='width:0%; min-width:0px'></div>";
                                            }
                                            else{
                                                echo"<div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width:".$percentage."%; min-width:20px'>".$percentage."%</div>";
                                            }
                                        }
                                    }
                                    
                                    $conn->close();

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-1">
                        <div class="card-body">
                            
                            <b class="h6">NUMBER OF HOURS LEFT</b>
                            <hr class="bg-info" />

                            <div class="container text-center">
                            <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "delldb";
                                
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                
                                    if($conn->connect_error){
                                        die("Connection failed: " .$conn->connect_error);
                                    }

                                    date_default_timezone_set("Asia/Kuala_Lumpur");
                                    $date = date('Y-m-d');

                                    $sql = "SELECT SUM(user_event.contribution) AS THour, HOUR(TIMEDIFF('100000', SUM(user_event.contribution))) AS Hr, MINUTE(TIMEDIFF('100000', SUM(user_event.contribution))) AS Min
                                            FROM event_table, user_event
                                            WHERE event_table.datepicker<='$date' AND event_table.eventcategory ='training' AND event_table.eventid = user_event.eventid AND userid=1
                                            ORDER BY datepicker";
                                    
                                    $result = $conn->query($sql);                    

                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $checkcomplete = 100000 - $row['THour'];
                                            if ($checkcomplete<=0){
                                                echo "<h5 class='text-danger'>You have completed the target</h5>";
                                            }
                                            else{
                                                echo"<h5>".$row['Hr']." hours ".$row['Min']." minutes </h5>";
                                            }
                                            
                                            
                                        }
                                    }
                                    
                                    $conn->close();

                                ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;">
        <div class="row">
            <div class="col-md-4 m-2">

                <div class="row">
                    
                    <h3><img src="schedule.png" class="rounded-circle" alt="schedule" height="90" style="vertical-align: middle">Training Program Schedule</h3>

                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "delldb";
                    
                        $conn = new mysqli($servername, $username, $password, $dbname);
                    
                        if($conn->connect_error){
                            die("Connection failed: " .$conn->connect_error);
                        }

                        date_default_timezone_set("Asia/Kuala_Lumpur");
                        $date = date('Y-m-d');

                        $sql = "SELECT TIMEDIFF(event_table.appt1,event_table.appt) AS time1, eventid FROM event_table";
                        $result2 = $conn->query($sql);

                        //Create a SQL String
                        if($result2->num_rows>0){
                            while($row = $result2->fetch_assoc()){

                                $sql = "UPDATE user_event SET contribution='".$row['time1']."' WHERE eventid = ".$row['eventid']." AND userid=1";
                                $conn->query($sql);
                            } 
                        }
                        
                        $sql = "SELECT event_table.eventname, event_table.eventtype, event_table.datepicker, event_table.appt ,event_table.appt1, event_table.venue,event_table.compulsory, user_event.contribution
                        FROM event_table, user_event
                        WHERE datepicker>='$date' AND eventcategory ='training' AND event_table.eventid = user_event.eventid AND userid=1
                        ORDER BY datepicker";
                        $result = $conn->query($sql);                     


                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "
                                <div class='col-md-12 mb-3'>
                                    <div class='card m-1'><a href='details.html' style='text-decoration:none; color:black'>
                                        <div class='card-header'>
                                            <h5 class='card-title'>". $row['eventname'] ."</h5>
                                            <h6 class='class-subtitle'>". $row['eventtype'] ."</h6>
                                        </div>
                                        <div class='card-body'>
                                            <p>Date: ". $row['datepicker'] ."<br>
                                                Time: ". $row['appt']. " - ". $row['appt1'] ."<br>
                                                Venue: ". $row['venue'] ."<br>
                                                Contribution hour: ". $row['contribution']."<br>

                                            </p>";

                                            if ($row['compulsory'] == "Yes") {
                                                echo "<span class='badge badge-danger float-right'>Compulsory</span>";
                                              }
                                            else{
                                                  echo"<span class='badge badge-info float-right'>Optional</span>";}
                                            
                                       echo" </div>
                                        </a>
                                    </div>
                                </div>";
                            }
                        }
                        else{
                            echo "<div class='col-md-12 mb-3'>
                            <div class='card m-1'><a href='details.html' style='text-decoration:none; color:black'>
                            <div class='card-body'>
                            <p>No Events Yet</p></div></div></div>";
                        }
                        $conn->close();
                    ?>
                </div>
            </div>

                    <div class="col-md-4 m-2 ">

                        <div class="row">
                            
                            <h3><img src="schedule.png" class="rounded-circle" alt="schedule" height="90" style="vertical-align: middle">Event Schedule</h3>  
                            <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "delldb";
                    
                        $conn = new mysqli($servername, $username, $password, $dbname);
                    
                        if($conn->connect_error){
                            die("Connection failed: " .$conn->connect_error);
                        }

                        date_default_timezone_set("Asia/Kuala_Lumpur");
                        $date = date('Y-m-d');

                        $sql = "SELECT TIMEDIFF(event_table.appt1,event_table.appt) AS time1, eventid FROM event_table";
                        $result2 = $conn->query($sql);

                        //Create a SQL String
                        if($result2->num_rows>0){
                            while($row = $result2->fetch_assoc()){

                                $sql = "UPDATE user_event SET contribution='".$row['time1']."' WHERE eventid = ".$row['eventid']." AND userid=1";
                                $conn->query($sql);
                            } 
                        }
                        
                        $sql = "SELECT event_table.eventname, event_table.eventtype, event_table.datepicker, event_table.appt ,event_table.appt1, event_table.venue,event_table.compulsory, user_event.contribution
                        FROM event_table, user_event
                        WHERE datepicker>='$date' AND eventcategory ='Other Events' AND event_table.eventid = user_event.eventid AND userid=1
                        ORDER BY datepicker";
                        $result = $conn->query($sql);                     


                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "
                                <div class='col-md-12 mb-3'>
                                    <div class='card m-1'><a href='details.html' style='text-decoration:none; color:black'>
                                        <div class='card-header'>
                                            <h5 class='card-title'>". $row['eventname'] ."</h5>
                                            <h6 class='class-subtitle'>". $row['eventtype'] ."</h6>
                                        </div>
                                        <div class='card-body'>
                                            <p>Date: ". $row['datepicker'] ."<br>
                                                Time: ". $row['appt']. " - ". $row['appt1'] ."<br>
                                                Venue: ". $row['venue'] ."<br>
                                                Contribution hour: ". $row['contribution']."<br>

                                            </p>";

                                            if ($row['compulsory'] == "Yes") {
                                                echo "<span class='badge badge-danger float-right'>Compulsory</span>";
                                              }
                                            else{
                                                  echo"<span class='badge badge-info float-right'>Optional</span>";}
                                            
                                       echo" </div>
                                        </a>
                                    </div>
                                </div>";
                            }
                        }
                        else{
                            echo "<div class='col-md-12 mb-3'>
                            <div class='card m-1'><a href='details.html' style='text-decoration:none; color:black'>
                            <div class='card-body'>
                            <p>No Events Yet</p></div></div></div>";
                        }
                        $conn->close();
                    ?>
                        </div>
                    </div>


                    <div class="col-md-3 my-3 m-2 ">
                        <div class="row">
                            
                            <h3><img src="event.png" class="rounded-circle" alt="Profile Picture" height="90" style="vertical-align: middle">Recomended Event</h3>
                        </div>
                        <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "delldb";
                            
                                $conn = new mysqli($servername, $username, $password, $dbname);
                            
                                if($conn->connect_error){
                                    die("Connection failed: " .$conn->connect_error);
                                }

                                date_default_timezone_set("Asia/Kuala_Lumpur");
                                $date = date('Y-m-d');

                                $sql = "SELECT eventname,datepicker,appt,appt1,venue,description FROM event_table WHERE datepicker>='$date' ORDER BY datepicker ";
                                $result = $conn->query($sql);

                                // IMPORTANT!! php code use ', html code use ''
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        echo "
                                        <div class='card m-2' style='width: 20rem;'><a href='details.html' style='text-decoration:none; color:black'>
                                        <img src='https://images.pexels.com/photos/5475757/pexels-photo-5475757.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
                                        ' class='card-img-top' alt='...'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $row['eventname'] ."</h5>
                                            <h6 class='class-subtitle'>Volunteering</h6>
                                        </div>
                                        </a></div>";
                                    }
                                }
                                else{
                                    echo '<p>No events to show</p>';
                                }
                                $conn->close();
                            ?>
                    </div>
</body>

</html>