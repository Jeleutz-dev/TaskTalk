<?php

$projid = $_POST['projid'];
$grpid = $_POST['idgrp'];
$grpno = $_POST['upid'];

$igrpno = 0;

$users_arr = array();

if($idgrpno > 0){

$query = mysqli_query($conn, "SELECT DISTINCT students.uidUsers, groups.idGroups, groups.groupno, concat(groups.leader, ',', groups.members) from students,groups where concat(groups.leader, ',', groups.members) NOT RLIKE students.uidUsers and groups.projid = '".$projid."' and groups.idGroups = '".$grpid."' and groupno = '".$grpno."'");
$array = array();

    while($data = mysqli_fetch_assoc($query)){
    $query1 = mysqli_query($conn, "SELECT * FROM students WHERE uidUsers = '".$data['uidUsers']."'");
    $data1 = mysqli_fetch_array($query1);
        $userid = $row['uidUsers'];
        $name = $row['f_name'];
                                  
    $users_arr[] = array("uidUsers" => $userid, "f_name" => $name);
    
    }
}

    echo json_encode($users_arr);
?>