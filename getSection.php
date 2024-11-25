<?php
include "includes/dbh.inc.php";

$departid = 0;

if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}

$users_arr = array();

if($departid > 0){
    $sql = "SELECT idSection,section FROM section WHERE department=".$departid;

    $result = mysqli_query($conn,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['idSection'];
        $name = $row['section'];
    
        $users_arr[] = array("idSection" => $userid, "section" => $name);
    }
}

// encoding array to json format
echo json_encode($users_arr);