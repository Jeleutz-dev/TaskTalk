<?php

if (isset($_POST['Add-Member']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $groupno = $_POST['id'];
    $groupid = $_POST['grp'];
    $projname = $_POST['projname'];
    $projId = $_POST['projId'];
    $leader = $_POST['lead'];
    $members = $_POST['members'];
    $createdby = $_POST['createdby'];
    $userName = $_POST['uid'];
    
    if (empty($members))
    {
        header("Location: ../Students/project-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=emptyfields&members=");
        exit();
    }
    
    else
    {

        $values  = implode(",", $members);
        $query = "UPDATE `groups` SET `members`='".$values."' WHERE `idGroups` = $groupid";
        
        $result = mysqli_query($conn, $query);
        
        if(!$result)
        {
            //Professors/project-board.php?course=4&section=21&subject=Physical+Fitness+and+Self-Testing+Activities&id=105&projname=Project+3
            header("Location: ../Students/project-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
                exit();
        }
        
        else
        {
            $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
            $que = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Students/project-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&error=sqlerror");
                exit();
            }

            else
            {
                    
                mysqli_stmt_bind_param($que, "ss", $userName, $action);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);

                $sql_que = mysqli_query($conn, "SELECT * FROM section where idSection='".($section). "'");
                $qu = mysqli_fetch_assoc($sql_que);
                $sec = $qu['section'];

                $result = mysqli_query($conn, "SELECT * FROM course where idCourse='".($course). "'");
                $res = mysqli_fetch_assoc($result);
                $qrr = $res['depart_name'];


                header("Location: ../Students/project-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname&add_members=success");
                exit();
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projId&projname=$projname");
    exit();
}