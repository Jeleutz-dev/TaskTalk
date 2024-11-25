<?php

if (isset($_POST['Add-Grade']))
{

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $action = "Uploaded Grade"; 
    $projid = $_POST['id'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $leader = $_POST['gradelead'];
    $grpgrade = $_POST['grpgrade'];
    $projsubid = $_POST['projsubid'];
    $grade = $_POST['grade'];
    $gradetype = $_POST['gradetype'];
    $uploadedby = $_POST['uploadedby'];
    $projstat = 'Done';

    $name = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".$projid."' AND idGroups='".$grpid."' AND groupno='".$grpno."' ");
    $nameq = mysqli_fetch_assoc($name);
    
    $list = explode(",", $nameq['members']);
    $imp = implode(",", $grade);
    $exp = explode(",",$imp);
    $lead = $nameq['leader'];
    $grpname = 'Group';
    print_r($list);
    
    $sql = "INSERT INTO gradedproject(projid, grpid, grpno, projsubid, member, grade, gradetype, uploadedby) VALUES ('$projid','$grpid','$grpno','$projsubid','$lead','$leader','$gradetype','$uploadedby')";
    
    if(mysqli_query($conn,$sql))
    {
        $sq = "INSERT INTO gradedproject(projid, grpid, grpno, projsubid, member, grade, gradetype, uploadedby) values (?,?,?,?,?,?,?,?)";
        $qry = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($qry, $sq))
        {
            header("Location: ../Professors/grade-book.php?&error=sqlerror");
            exit();
        }

        else{

            for($x=0; $x<count($exp); $x++){
                mysqli_stmt_bind_param($qry, "ssssssss", $projid, $grpid, $grpno, $projsubid, $list[$x], $exp[$x], $gradetype, $uploadedby);
                mysqli_stmt_execute($qry);
                mysqli_stmt_store_result($qry);
            }

            $sql = "INSERT INTO gradedproject(projid, grpid, grpno, projsubid, member, grade, gradetype, uploadedby) VALUES ('$projid','$grpid','$grpno','$projsubid','$grpname','$grpgrade','$gradetype','$uploadedby')";
            if(!mysqli_query($conn,$sql))
            {
                header("Location: ../Professors/grade-book.php?&error=sqlerror");
                exit();
            }
            else{
                
                $query = "UPDATE `groups` SET `projstat`='".$projstat."' WHERE `idGroups` = $grpid";
                
                $result = mysqli_query($conn, $query);
                
                if(!$result)
                {
                    header("Location: ../Professors/grade-book.php?error=sqlerror");
                    exit();
                }
                else
                {

                    $sql = "insert into activity_log(uidUsers, action)"
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/grade-book.php?&error=sqlerror");
                        exit();
                    }
                    else
                    {
                    
                    mysqli_stmt_bind_param($que, "ss", $userName, $action);
                    mysqli_stmt_execute($que);
                    mysqli_stmt_store_result($que);
                    header("Location: ../Professors/grade-book.php?add_grade=success");
                    exit();
                    }
                }
            }
        }
    }
    else
    {
        header("Location: ../Professors/grade-book.php?");
        exit();
    }

   
}
