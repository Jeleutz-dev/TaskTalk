<?php

if (isset($_POST['Add-Button']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $no = $_POST['no'];
    $sno = $_POST['sno'];
    $projname = $_POST['projn'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $createdby = $_POST['createdby'];
    $duedate = $_POST['due'];
    $projdesc = $_POST['projd'];
    $member = $_POST['member'];
    $userName = $_POST['uid'];
    
    if (empty($projname) || empty($duedate))
    {
        header("Location: ../Students/project-list.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        // checking if a user already exists with the given username
        $sql1 = "select projname from studprojects where projname=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql1))
        {
            header("Location: ../s-signup.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $projname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                    $sqlq = mysqli_query($conn, "SELECT * FROM section where idSection='".($section). "'");
                    $q1 = mysqli_fetch_assoc($sqlq);
                    $sec1 = $q1['section'];

                    $res1 = mysqli_query($conn, "SELECT * FROM course where idCourse='".($course). "'");
                    $res2 = mysqli_fetch_assoc($res1);
                    $q2 = $res2['depart_name'];

                header("Location: ../Students/project-list.php?sno=$section&subject_name=$subject&course=$q2&no=$course&section=$sec1&error=projectnamealreadyexists=".$projname);
                exit();
            }
            else
            {

                $values  = implode(",", $member);
                $sql = "insert into studprojects(projname, subj_name, course, section, createdby, projdesc, duedate,"
                        . "member) "
                        . "values (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../Students/project-list.php?&error=sqlerror");
                    exit();
                }
                else
                {
                    
                    mysqli_stmt_bind_param($stmt, "ssssssss", $projname, $subject, $course, $section, $createdby, $projdesc,
                            $duedate,
                            $values);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Students/project-list.php?error=sqlerror");
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


                    header("Location: ../Students/project-list.php?projectadd=success");
                    exit();
                    }
                }
            }
            
        
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}
}

else
{
    header("Location: ../Students/project-list.php?");
    exit();
}