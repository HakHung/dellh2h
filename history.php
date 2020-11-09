<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
  <title>Bootstrap</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

</head>

<body>
  <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
    <a class='navbar-brand' href='index.php'>ITDP</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav mr-auto'>
        <li class='nav-item '>
          <a class='nav-link' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='training.php'>Events</a>
        </li>
        <li class='nav-item active'>
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
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "delldb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d');

    $sql = "SELECT event_table.eventid, event_table.eventname,MONTH(event_table.datepicker) AS month,event_table.appt,event_table.appt1,event_table.venue
                    FROM event_table, user_event
                    WHERE event_table.eventcategory ='training' AND user_event.eventid = event_table.eventid  AND user_event.userid = 1
                    ORDER BY event_table.datepicker ";
    $result = $conn->query($sql);

    $date2 = date('m');

    $printedmonth = FALSE;
    $count = 1;
    echo "<div class='container'>
          <h2>Statistics</h2>
          <table class='table table-hover text-center col-10'>
            <thead class='thead-dark'>
              <tr>
              <th>Month</th>
        <th>Training (Hour)</th>
        <th>Event (Hour)</th>
        <th>Total (Hour)</th>
        </tr>
        </thead>
        <tbody>
  ";
    for ($i = $date2; $count < 12; $i++, $count++) {
        $printedmonth = FALSE;
        if ($i == 12) {
            $i = 1;
        }

        if ($result->num_rows > 0) {
            $result->data_seek(0);

            while ($row = $result->fetch_assoc()) {
                // $month = date("m", strtotime($row['datepicker']));
                // echo "<h1>". $month ."</h1>";                                                                         
                if ($row['month'] == $i) {
                    if ($printedmonth == FALSE) {
                        $monthName = date('F', mktime(0, 0, 0, $row['month'], 10));
                        $printedmonth = TRUE;
                        echo "<tr><td>" . $monthName . "</td>";

                      //   $sql = "SELECT SUM(user_event.contribution) AS THour FROM user_event,event_table WHERE MONTH(".$row['month'].") = MONTH(event_table.datepicker)"
                      //   $result2 = $conn->query($sql);
                      //   if($result2->num_rows>0){
                      //     while($row2 = $result2->fetch_assoc()){
                      //       echo "<td>" . $row2['THour'] . "</td>";
                      //     } 
                      // }


                        
                        
                    }
                  }
              }
          }
      }
  echo "</tr>
  </tbody>
  </table>
    </div>";

    echo" <div class='container'>

    <div class='row'>
      <h4 class='m-3'>History Activities Details</h4>
      <form class='form-inline '>

        <button class='btn btn-primary mr-5' type='button'>OCT - DEC</button>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>JAN - MAR</button></a>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>APR - JUN</button></a>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>JUL - SEP</button></a>
      </form>

    </div>

    </nav>


    <table class='table table-hover table-sm text-center col-10'>
      <thead class='thead-dark'>
        <tr>
          <th colspan='5'>Oct 2020</th>
        </tr>
      </thead>
      <thead class='thead-dark'>
        <tr>
          <th>Events</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
          <th>Contribution Hours</th>
        </tr>
      </thead>
      <tbody>
        ";

        for ($i = $date2; $count < 12; $i++, $count++) {
          $printedmonth = FALSE;
          if ($i == 12) {
              $i = 1;
          }
    
          if ($result->num_rows > 0) {
              $result->data_seek(0);
    
              while ($row = $result->fetch_assoc()) {
                  $month = date("m", strtotime($row['datepicker']));
                  // echo "<h1>". $month ."</h1>";                                                                         
                  if ($month == $i) {
                      if ($printedmonth == FALSE) {
                          $monthName = date('F', mktime(0, 0, 0, $month, 10));
                          $printedmonth = TRUE;
                          echo "<tr><td>" . $row['datepicker']. "</td>";
                          echo "<td>" . $row['appt']. " - ". $row['appt1'] . "</td>";
                          echo "<td>"  . $row['venue'] . "</td>";
                          echo "<td>"  . $row['contribution']. "</td>";
                      }
                    }
                }
            }
        }
        echo "</tr>
  </tbody>
  </table>
    </div>";   
    ?>
  <!-- <div class='container'>
    <h2>Statistics</h2>
    <table class='table table-hover text-center col-10'>
      <thead class='thead-dark'>
        <tr>
          <th>Month</th>
          <th>Training (Hour)</th>
          <th>Event (Hour)</th>
          <th>Total (Hour)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div> -->

  <div class='container'>

    <div class='row'>
      <h4 class='m-3'>History Activities Details</h4>
      <form class='form-inline '>

        <button class='btn btn-primary mr-5' type='button'>OCT - DEC</button>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>JAN - MAR</button></a>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>APR - JUN</button></a>
        <a href='#'><button class='btn btn-outline-primary mr-5' type='button'>JUL - SEP</button></a>
      </form>

    </div>

    </nav>


    <table class='table table-hover table-sm text-center col-10'>
      <thead class='thead-dark'>
        <tr>
          <th colspan='5'>Oct 2020</th>
        </tr>
      </thead>
      <thead class='thead-dark'>
        <tr>
          <th>Events</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
          <th>Contribution Hours</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Training 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>12</th>
        </tr>
      </thead>
    </table>

    <table class='table table-hover table-sm text-center col-10'>
      <thead class='thead-dark'>
        <tr>
          <th colspan='5'>Nov 2020</th>
        </tr>
      </thead>
      <thead class='thead-dark'>
        <tr>
          <th>Events</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
          <th>Contribution Hours</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Training 1</td>
          <td>01-Sep-20</td>
          <td>10:00am - 12:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>12</th>
        </tr>
      </thead>
    </table>

    <table class='table table-hover table-sm text-center col-10'>
      <thead class='thead-dark'>
        <tr>
          <th colspan='5'>Dec 2020</th>
        </tr>
      </thead>
      <thead class='thead-dark'>
        <tr>
          <th>Events</th>
          <th>Date</th>
          <th>Time</th>
          <th>Venue</th>
          <th>Contribution Hours</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Training 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>12</th>
        </tr>
      </thead>
    </table>
  </div>
</body>

</html>