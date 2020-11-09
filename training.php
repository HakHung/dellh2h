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
    <style>
        body {
            height: 1000px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">ITDP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eventlist.html">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.html">History</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Xuan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><small>Logout</small></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light my-3 ml-0">
                <form class="form-inline ">
                    <a href="learningpath.html"><button class="btn btn-outline-primary mr-5" type="button">Learning path</button></a>
                    <button class="btn btn-primary mr-5" type="button">Trainings</button>
                    <a href="volunteer.html"><button class="btn btn-outline-primary mr-5" type="button">Events</button></a>

                    <!-- <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button> -->
                </form>
            </nav>
        </div>

        </nav>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src='http://placehold.it/280x180' class="card-img-top" alt="...">
                <div class="card-body">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "events";
                    
                        $conn = new mysqli($servername, $username, $password, $dbname);
                    
                        if($conn->connect_error){
                            die("Connection failed: " .$conn->connect_error);
                        }

                        $sql = "SELECT event, date, startingtime, endingtime, venue, description FROM events";
                        $result = $conn->query($sql);

                        // IMPORTANT!! php code use ', html code use ''
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "<h5 class='card-title'>". $row['event'] ."</h5>
                                <p class='card-text'>". $row['date'] ."</p>
                                <p class='card-text'>". $row['startingtime'] . $row['endingtime'] ."</p>
                                <p class='card-text'>". $row['venue'] ."</p>
                                <p class='card-text'>". $row['description'] ."</p>
                                <a href='#' class='btn btn-primary'>Register Now!</a>";
                            }
                        }
                        else{
                            echo '<p>No product to show</p>';
                        }
                        $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
