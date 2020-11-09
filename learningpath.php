<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <title>Learning Path</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <style>
        body {
            height: 1000px;
        }
    </style>
</head>

<body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
        <a class='navbar-brand' href='index.php'>ITDP</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
            aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php'>Home</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='learningpath.php'>Events</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='history.php'>History</a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='#'>Xuan</a>
                </li>
                <li class='nav-item active'>
                    <a class='nav-link' href='#'><small>Logout</small></a>
                </li>
            </ul>
        </div>
    </nav>


    <div class='container-fluid'>
        <!-- <div class='row'> -->
            <nav class='navbar navbar-expand-lg navbar-light my-5 mx-5'>
                <form class='form-inline '>
                    <button class='btn btn-primary mr-5' type='button'>Learning path</button>
                    <button class='btn btn-outline-primary mr-5' type='button'><a
                            href='training.php'>Trainings</a></button>
                    <button class='btn btn-outline-primary mr-5' type='button'><a
                            href='otherevents.php'>Events</a></button>

                    <!-- <button class='btn btn-sm btn-outline-secondary' type='button'>Smaller button</button> -->
                </form>
            </nav>
        <!-- </div> -->

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

                        $sql = "SELECT eventid, eventname,datepicker,appt,appt1,venue,description FROM event_table WHERE datepicker>='$date' AND eventcategory ='trainings' ORDER BY datepicker ";
                        $result = $conn->query($sql);

                        // for ($i=1; $i<=12; $i++){
                        //     if ($i == )
                        // }

                        $date2 = date('m');
                        
                        $printedmonth = FALSE;
                        $count = 1;
                        for ($i=$date2; $count<12; $i++, $count++){
                            $printedmonth = FALSE;
                            if ($i == 12){
                                $i = 1;
                            }
                                                        
                            if($result->num_rows>0){
                                $result->data_seek(0);
                                
                                while($row = $result->fetch_assoc()){ 
                                    $month = date("m",strtotime($row['datepicker'])); 
                                    // echo "<h1>". $month ."</h1>";                                                                         
                                    if ($month == $i){
                                        if($printedmonth == FALSE){
                                            $printedmonth=TRUE;
                                            echo "<div class='card-body'><h1>". $i ."</h1>";
                                            echo "<div class='row'>";                 
                                        }
                                                                       
                                            echo "
                                            <div class='card mx-5' style='width: 18rem;'>
                                            <img src='https://images.pexels.com/photos/461049/pexels-photo-461049.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' class='card-img-top' alt='...'>
                                            <div class='mx-4 my-4'>
                                            <h5 class='card-title'>". $row['eventname'] ."</h5>
                                            <p class='card-text'> Date: ". $row['datepicker'] ."</p>
                                            <p class='card-text'> Time: ". $row['appt']." - ". $row['appt1'] ."</p>
                                            <p class='card-text'>Venue: ". $row['venue'] ."</p>
                                            </div>
                                            <div class='text-center mb-3'><a href='details.html' class='btn btn-info'>View Info!</a>
                                            <a href='#' id='register' onclick='myFunction()' class='btn btn-primary'>Register Now!</a>
                                            </div>
                                            </div>";
                                    }
                                }
                                echo "</div></div>";
                            }
                            else{
                                echo '<p>No events to show</p>';
                            }          
                            

                        }
                                     
                     
                        $conn->close();
                    ?>
    </div>

    



</body>

</html>