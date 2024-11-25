<?php
include "includes/dbh.inc.php";

session_start();

// $_SESSION['grpid'] = $_POST['grpid'];

// echo $_SESSION['grpid'];

$groupid = 1;

// if(isset($_POST['grpid'])){
//    $groupid = mysqli_real_escape_string($conn,$_POST['grpid']); // department id
// }

$users_arr = array();

if($groupid > 0){
    $query = mysqli_query($conn, "SELECT DISTINCT user.uidUsers, user.f_name, user.l_name, groups.idGroups, groups.groupno, concat(groups.leader, ',', groups.members) FROM user,groups WHERE concat(groups.leader, ',', groups.members) NOT RLIKE user.uidUsers AND groups.idGroups = '".$_POST['grpid']."' AND groupno = '".$_POST['grpno']."'  AND user.userType ='student'");

    while($data = mysqli_fetch_assoc($query)){
    $array[] = $data;

        $uid = $data['uidUsers'];
        $f_name = $data['f_name'];
        $l_name = $data['l_name'];
    
        $users_arr[] = array("uidUsers" => $uid, "f_name" => $f_name, "l_name" => $l_name);
    }
}

echo json_encode($users_arr);
