<?php
if(isset($_POST["projn"]))
{
include("dbh.inc.php");
$projn = mysqli_real_escape_string($conn, $_POST["projn"]);
$createdby = mysqli_real_escape_string($conn, $_POST["createdby"]);
$query = "INSERT INTO notifications(notif_projname, notif_createdby)VALUES ('$projname', '$createdby')";
mysqli_query($conn, $query);
}
?>