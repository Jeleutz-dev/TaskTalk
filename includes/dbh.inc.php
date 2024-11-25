<?php

//time zone
date_default_timezone_set('Asia/Manila');

//database connection
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "tasktalk";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
