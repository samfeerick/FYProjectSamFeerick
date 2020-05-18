<?php
require 'common.php';
session_start();

if(!isset($_SESSION['user'])){
    		header("Location: http://localhost:8080/JavaBridgeTemplate721/login.php");
}

//Grab all users from our database
$users = $database->select("record_table", [
    'id',
    'Name',
    'TimeStamp'
]);

//Check if we have a year passed in through a get variable, otherwise use the current year
if (isset($_GET['year'])) {
    $current_year = int($_GET['year']);
} else {
    $current_year = date('Y');
}

//Check if we have a month passed in through a get variable, otherwise use the current year
if (isset($_GET['month'])) {
    $current_month = $_GET['month'];
} else {
    $current_month = date('n');
}

//Calculate the amount of days in the selected month
$num_days = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link active">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link">View Users</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link active">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Attendance</h2>
        </div>
        <table class="table table-striped table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Timestamp</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    //Loop through all our available users
                    foreach($users as $user) {
                        echo '<tr>';
                        echo '<td scope="row">' . $user['id'] . '</td>';
                        echo '<td scope="row">' . $user['Name'] . '</td>';
                        echo '<td scope="row">' . $user['TimeStamp'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</html>
