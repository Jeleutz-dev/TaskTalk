<?php

if (isset($_POST['Add-Button']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $no = $_POST['no'];
    $sno = $_POST['sno'];
    $projname = $_POST['projname'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $leader = $_POST['leaders'];
    $createdby = $_POST['createdby'];
    $duedate = $_POST['due'];
    $projdesc = $_POST['projd'];
    $userName = $_POST['uid'];
    $grpno = $_POST['grpno'];
    $projid = $_POST['projid'];
    
    $projid = $_POST['projid'];
    $projstat = "On-Going";
    $grpcode = substr(md5(microtime()), rand(0,25), 8);
    
    if (empty($leader))
    {
        header("Location: ../Professors/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        // $squery = mysqli_query($conn,"SELECT * FROM projects where id ='".$projid."'");
        // $que1 = mysqli_fetch_assoc($squery);
        // $lead = explode(',',$que1['leader']);
        // $arrayi = implode(",",$leader);
    
        // array_push($lead, $arrayi);
        $values  = implode(",", $leader);

        $query = "UPDATE `projects` SET `leader`='".$values."' WHERE `id` = $projid";

        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
            exit();
        }
        else
        {


            $sq = "insert into groups(course, section, subject, groupno, projid, leader, projstat, grpcode, createdby) values (?,?,?,?,?,?,?,?,?)";
            $qry = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($qry, $sq))
            {
                header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
                exit();
            }

            else{

                for($x=0; $x<count($leader); $x++){
                    $grp_no = $x+1;
                    $newcode = $grpcode++;
                    mysqli_stmt_bind_param($qry, "sssssssss", $course, $section, $subject, $grp_no, $projid, $leader[$x], $projstat, $newcode, $createdby);
                    mysqli_stmt_execute($qry);
                    mysqli_stmt_store_result($qry);
                }
            
            
                $sql = "insert into activity_log(uidUsers, action) "
                . "values (?,?)";
                $que = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($que, $sql))
                {
                    header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&error=sqlerror");
                    exit();
                }

                else
                {
                
                    mysqli_stmt_bind_param($que, "ss", $userName, $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);


                    header("Location: ../Professors/project-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&add_groups=success");
                    exit();
                }
            }
        
        }
        // $stmt->close();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
}


else
{
    header("Location: ../Professors/dashboard.php?");
    exit();
}