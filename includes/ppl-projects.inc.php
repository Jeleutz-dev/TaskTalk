<?php

if (isset($_POST['Add-Button']))
{
    
    require 'dbh.inc.php';
    
    $action = $_POST['action'];
    $no = $_POST['no'];
    $sno = $_POST['sno'];
    $projname = $_POST['projn'];
    $subject = $_POST['subj'];
    $course = $_POST['co'];
    $section = $_POST['sect'];
    $leader = $_POST['leader'];
    $createdby = $_POST['createdby'];
    $duedate = $_POST['due'];
    $projdesc = $_POST['projd'];
    $userName = $_POST['uid'];
    $projstat = "On-Going";
    $projcode = substr(md5(microtime()), rand(0,25), 6);
    $grpcode = substr(md5(microtime()), rand(0,25), 8);
    $score = $_POST['score'];
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $one_mb = 0.001;
    $fileSize = $_FILES['file']['size'];
    $fileSize_mb = $fileSize*$one_mb;
    $fileType = $_FILES['file']['type']; 
    $file_store = '../uploads/Criteria/'.$fileName;

    if (empty($projname) || empty($duedate))
    {
        header("Location: ../Professors/dashboard.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $values  = implode(",", $leader);
        $sql = "insert into projects(projname, subj_name, course, section, leader, createdby, projdesc, duedate, score, criteria, filesize, projstat, projcode)"
                . "values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Professors/projects.php?&error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $projname, $subject, $course, $section, $values, $createdby, $projdesc,
                    $duedate, $score, $fileName, $fileSize_mb, $projstat, $projcode);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $id = $stmt->insert_id;



                $sq = "insert into groups(course, section, subject, groupno, projid, leader, projstat, grpcode, createdby) values (?,?,?,?,?,?,?,?,?)";
                $qry = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($qry, $sq))
                {
                    header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
                    exit();
                }

                else{

                    for($x=0; $x<count($leader); $x++){
                        $grp_no = $x+1;
                        $newcode = $grpcode++;
                        mysqli_stmt_bind_param($qry, "sssssssss", $course, $section, $subject, $grp_no, $id, $leader[$x], $projstat, $newcode, $createdby);
                        mysqli_stmt_execute($qry);
                        mysqli_stmt_store_result($qry);
                    }
                
                
                    $sql = "insert into subj_add(subject, uidUsers, projid)"
                        . "values (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../Professors/project-list.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "sss", $subject, $userName, $id);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                    }

                    $sql = "insert into section_add(course, section, subject, uidUsers, projid)"
                        . "values (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../Professors/project-list.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                    
                    mysqli_stmt_bind_param($stmt, "sssss", $course, $section, $subject, $userName, $id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    }

                
                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    $actions = 'Add Groups';

                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/dashboard.php?&error=sqlerror");
                        exit();
                    }

                    else
                    {
                        mysqli_stmt_bind_param($que, "ss", $userName, $actions);
                        mysqli_stmt_execute($que);
                        mysqli_stmt_store_result($que);
                    }

                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);
                    $action1 = 'Add Subject';

                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/dashboard.php?&error=sqlerror");
                        exit();
                    }

                    else
                    {
                    
                        mysqli_stmt_bind_param($que, "ss", $userName, $action1);
                        mysqli_stmt_execute($que);
                        mysqli_stmt_store_result($que);
                    }
                    
                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
                        exit();
                    }

                    else
                    {
                    
                        mysqli_stmt_bind_param($que, "ss", $userName, $action);
                        mysqli_stmt_execute($que);
                        mysqli_stmt_store_result($que);


                        header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&add_project=success");
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
    header("Location: ../Professors/project-list.php?course=$course&section=$section&subject=$subject");
    exit();
}