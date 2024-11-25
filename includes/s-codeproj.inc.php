<?php

if (isset($_POST['Add-Button']))
{
    
    require 'dbh.inc.php';
    
    $action = 'Added Leader Using Project Code';
    $projcode = $_POST['projcode'];
    $userName = $_POST['uid'];
    $projstat = 'On-Going';
    $grpcode = substr(md5(microtime()), rand(0,25), 8);
    // $userName = 'maddie';
    
    if (empty($projcode))
    {
        header("Location: ../Students/project-board.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        // checking if a user already exists with the given section
        $uexist = mysqli_query($conn, "SELECT leader FROM projects WHERE leader RLIKE '".$userName."' AND projcode ='".$projcode."'");
        $existquery_ = mysqli_num_rows($uexist);
            
        if ($existquery_ > 0)
        {
            header("Location: ../Students/project-list.php?group_leader_already_exists=".$userName);
            exit();
        }
        else
        {
            $sqlquery = mysqli_query($conn,"SELECT * FROM projects where projcode = '".$grpcode."' ");
            $checkempty = mysqli_fetch_assoc($sqlquery);

            if(empty($checkempty['leader'])){

                $query = "UPDATE `projects` SET `leader`='".$userName."' WHERE `projcode` = '".$projcode."'";

                $result = mysqli_query($conn, $query);

                if (!$result)
                {
                    header("Location: ../Students/project-list.php?&error=sqlerror1");
                    exit();
                }
                else
                {

                    $sq = "insert into groups(course, section, subject, groupno, projid, leader, projstat, grpcode, createdby) values (?,?,?,?,?,?,?,?,?)";
                    $qry = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($qry, $sq))
                    {
                        header("Location: ../Students/project-list.php?&error=sqlerror2");
                        exit();
                    }

                    else{

                        $proj = mysqli_query($conn,"SELECT * FROM projects where projcode ='".$projcode."'");
                        $pqry = mysqli_fetch_assoc($proj);

                        $sql = mysqli_query($conn, "SELECT * FROM groups where projid = '".$pqry['id']."'");
                        $count = mysqli_num_rows($sql);

                        $grpno = $count+1;

                        mysqli_stmt_bind_param($qry, "sssssssss", $pqry['course'], $pqry['section'], $pqry['subj_name'], $grpno, $pqry['id'], $userName, $projstat, $grpcode, $pqry['createdby']);
                        mysqli_stmt_execute($qry);
                        mysqli_stmt_store_result($qry);
                    
                    
                        $sql = "insert into activity_log(uidUsers, action) "
                        . "values (?,?)";
                        $que = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($que, $sql))
                        {
                            header("Location: ../Students/project-list.php?&error=sqlerror3");
                            exit();
                        }

                        else
                        {
                        
                            mysqli_stmt_bind_param($que, "ss", $userName, $action);
                            mysqli_stmt_execute($que);
                            mysqli_stmt_store_result($que);


                            header("Location: ../Students/project-list.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&add_groups=success");
                            exit();
                        }
                    }
                
                }
            }
            else{
            // checking if a section already exists with the given section
                $squery = mysqli_query($conn,"SELECT * FROM projects where projcode ='".$projcode."'");
                $que1 = mysqli_fetch_assoc($squery);
                $lead = explode(',',$que1['leader']);
                // $arrayi = implode(",",$userName);
            
                array_push($lead, $userName);
                $values  = implode(",", $lead);

                $query = "UPDATE `projects` SET `leader`='".$values."' WHERE `projcode` = '".$projcode."'";

                $result = mysqli_query($conn, $query);

                if (!$result)
                {
                    header("Location: ../Students/project-list.php?&error=sqlerror1");
                    exit();
                }
                else
                {

                    $sq = "insert into groups(course, section, subject, groupno, projid, leader, projstat, grpcode, createdby) values (?,?,?,?,?,?,?,?,?)";
                    $qry = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($qry, $sq))
                    {
                        header("Location: ../Students/project-list.php?&error=sqlerror2");
                        exit();
                    }

                    else{

                        $proj = mysqli_query($conn,"SELECT * FROM projects where projcode ='".$projcode."'");
                        $pqry = mysqli_fetch_assoc($proj);

                        $sql = mysqli_query($conn, "SELECT * FROM groups where projid = '".$pqry['id']."'");
                        $count = mysqli_num_rows($sql);

                        $grpno = $count+1;

                        mysqli_stmt_bind_param($qry, "sssssssss", $pqry['course'], $pqry['section'], $pqry['subj_name'], $grpno, $pqry['id'], $userName, $projstat, $grpcode, $pqry['createdby']);
                        mysqli_stmt_execute($qry);
                        mysqli_stmt_store_result($qry);
                    
                    
                        $sql = "insert into activity_log(uidUsers, action) "
                        . "values (?,?)";
                        $que = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($que, $sql))
                        {
                            header("Location: ../Students/project-list.php?&error=sqlerror3");
                            exit();
                        }

                        else
                        {
                        
                            mysqli_stmt_bind_param($que, "ss", $userName, $action);
                            mysqli_stmt_execute($que);
                            mysqli_stmt_store_result($que);


                            header("Location: ../Students/project-list.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&add_groups=success");
                            exit();
                        }
                    }
                
                }
                // $stmt->close();
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
        }

    }
}


else
{
    header("Location: ../Students/project-list.php?");
    exit();
}