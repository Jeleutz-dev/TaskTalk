<?php

if (isset($_POST['Delete-Group']))
{
    
    require 'dbh.inc.php';
    
    
    $action = $_POST['action'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $projdesc = $_POST['projdesc'];
    $duedate = $_POST['duedate'];
    $taskstat = 'On-Going';
    $userName = $_POST['uid'];
    $leader = $_POST['leaders'];
    $projid = $_POST['projid'];
    $grpid = $_POST['gpdid'];
    $grpno = $_POST['groupno'];
    
    if (empty($grpid))
    {
        header("Location: ../Professors/404.html");
        exit();
    }
    
    else
    {
        // sql to delete a record
        $sql = "DELETE groups, tasks , subtasks, announcements, comments, peer_grading, projsubmit, gradedproject, fileupload
        FROM groups 
        LEFT join tasks on groups.idGroups = tasks.grpid
        LEFT join subtasks on groups.idGroups = subtasks.grpid
        LEFT join announcements on groups.idGroups = announcements.grpid
        LEFT join comments on groups.idGroups = comments.grpid
        LEFT join peer_grading on groups.idGroups = peer_grading.grpid
        LEFT join projsubmit on groups.idGroups = projsubmit.grpid
        LEFT join gradedproject on groups.idGroups = gradedproject.grpid
        LEFT join fileupload on groups.idGroups = groups.idGroups
        WHERE
            groups.idGroups = '".$grpid."'";

        if (!mysqli_query($conn, $sql)) {
            header("Location: ../Professors/404.html?error=sqlerror");
            exit();
        }
        else{

            $gsql = mysqli_query($conn,"SELECT * FROM projects where id ='".$projid."'");
            $data = mysqli_fetch_assoc($gsql);

			$lead = explode(',',$data['leader']);

            $arr = array_diff($lead, array($leader));
			$val = implode(',',$arr);
            
            $query = "UPDATE `projects` SET `leader`='".$val."' WHERE `id` = $projid";

            $result = mysqli_query($conn, $query);

            if (!$result)
            {
                header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
                exit();
            }
            else
            {
                $sql = "insert into activity_log(uidUsers, action)"
                . "values (?,?)";
                $que = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($que, $sql))
                {
                    header("Location: ../Professors/dashboard.php?error=sqlerror");
                    exit();
                }
                else
                {
                
                mysqli_stmt_bind_param($que, "ss", $userName, $action);
                mysqli_stmt_execute($que);
                mysqli_stmt_store_result($que);
                header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&delete_group=success");
                exit();
                }
            }
            

        }
            
        
    }

    mysqli_stmt_close($sql);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Professors/dashboard.php?");
    exit();
}