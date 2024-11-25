<!-- <h1>Notifications</h1> -->

<?php
    
    include("functions.php");
    require '../includes/dbh.inc.php';
    
    $subject = $_GET['subject'];
    $course = $_GET['course'];
    $section = $_GET['section'];
    $groupno = $_GET['grpno'];
    $groupid = $_GET['grpid'];
    $projname = $_GET['projname'];
    $projId = $_GET['id'];
    $leader = $_GET['leader'];
    $members = $_GET['members'];
    $createdby = $_GET['createdby'];
    $userName = $_GET['uid'];
    $id = $_GET['idn'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    
header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&grpno=$groupno&grpid=$groupid&leader=$leader");
exit();
?><br/>

