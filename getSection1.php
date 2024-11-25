<?php
include "includes/dbh.inc.php";

$departid1 = 0;

if(isset($_POST['depart1'])){
   $departid1 = mysqli_real_escape_string($conn,$_POST['depart1']); // department id
}

$users_arr1 = array();

if($departid1 > 0){
    $sql = "SELECT idSection,section FROM section WHERE department=".$departid1;

    $result = mysqli_query($conn,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $userid1 = $row['idSection'];
        $name1 = $row['section'];
    
        $users_arr1[] = array("idSection" => $userid1, "section" => $name1);
    }
}

// encoding array to json format
echo json_encode($users_arr1);