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
  
  <div class='container-fluid'>
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
          <td>October</td>
          <td>10</td>
          <td>3</td>
          <td>13</td>
        </tr>
        <tr>
          <td>November</td>
          <td>12</td>
          <td>2</td>
          <td>14</td>
        </tr>
        <tr>
          <td>December</td>
          <td>2</td>
          <td>0</td>
          <td>2</td>
        </tr>
       
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total</th>
          <th>24</th>
          <th>5</th>
          <th>29</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class='container-fluid'>

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
          <td>Dell Hack2Hire</td>
          <td>01-Oct-20</td>
          <td>9:00am - 12:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
        <tr>
          <td>CyberSecurity</td>
          <td>11-Oct-20</td>
          <td>9:00am - 12:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
        <tr>
          <td>MySQL</td>
          <td>21-Oct-20</td>
          <td>9:00am - 12:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
        <tr>
          <td>CSR 1</td>
          <td>30-Oct-20</td>
          <td>10:00am - 12:00pm</td>
          <td>Zoo Negara</td>
          <td>4</td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>13</th>
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
          <td>01-Nov-20</td>
          <td>9:00am - 12:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
        <tr>
          <td>CSR 2</td>
          <td>03-Nov-20</td>
          <td>10:00am - 5:00pm</td>
          <td>Old Folks</td>
          <td>6</td>
        </tr>
        <tr>
          <td>Data Science with Python</td>
          <td>12-Nov-20</td>
          <td>10:00am - 5:00pm</td>
          <td>Zoom</td>
          <td>2</td>
        </tr>
        <tr>
          <td>Introduction to Python</td>
          <td>30-Nov-20</td>
          <td>10:00am - 5:00pm</td>
          <td>Zoom</td>
          <td>3</td>
        </tr>
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>14</th>
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
          <td>Training Program 4</td>
          <td>10-Dec-2020</td>
          <td>03.00pm - 05.00pm</td>
          <td>Dell Cyberjaya</td>
          <td>2</td>
        </tr>
        
      </tbody>
      <thead class='thead-light'>
        <tr>
          <th>Total Contribution Hours</th>
          <th></th>
          <th></th>
          <th></th>
          <th>2</th>
        </tr>
      </thead>
    </table>
  </div>
</body>

</html>