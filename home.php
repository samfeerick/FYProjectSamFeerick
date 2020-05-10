<?php
require 'common.php';
session_start();

if(!isset($_SESSION['user'])){
    		header("Location: http://localhost:8080/JavaBridgeTemplate721/login.php");
}
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
        <a class="navbar-brand" href="#">Sam Feerick Final Year Project</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link active">View Users</a>
            </li>
             <li class="nav-item">
                <a href="logout.php" class="nav-link active">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="col-md-6 order-md-1 text-center text-md-left pr-md-5">
            <h1 class="mb-3">Feerick Windows</h1>
            <p class="lead">
                Employee Attendance System
            </p>
            <div class="row mx-n2">
                <!-- if users needed uncommment this block
                <div class="col-md px-2">
                    <a href="users.php" class="btn btn-lg btn-outline-secondary w-100 mb-3">Users</a>
                </div>
                -->
                <div class="col-md px-2">
                    <a href="attendance.php" class="btn btn-lg btn-outline-secondary w-100 mb-3" >RFID Attendance</a>
                </div>
                
                <div class="col-md px-2">
                    <a href="fingerprint.php" class="btn btn-lg btn-outline-secondary w-100 mb-3" >Fingerprint Attendance</a>
                </div>
                
            </div>
        </div>
    </div>
</html>
