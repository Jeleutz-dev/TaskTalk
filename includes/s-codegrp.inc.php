<?php

if (isset($_POST['Add-Button']))
{
    
    require 'dbh.inc.php';
    
    $action = 'Added Member Using Group Code';
    $grpcode = $_POST['grpcode'];
    $userName = $_POST['uid'];
    // $projstat = 'On-Going';
    
    if (empty($grpcode))
    {
        header("Location: ../Students/project-list.php?error=emptyfields&uid=");
        exit();
    }
    
    else
    {
        $uexist = mysqli_query($conn, "SELECT members FROM groups WHERE (members RLIKE '".$userName."' OR leader = '".$userName."') AND grpcode ='".$grpcode."'");
        $existquery_ = mysqli_num_rows($uexist);
            
        if ($existquery_ > 0)
        {
            header("Location: ../Students/project-list.php?user_already_exists_in_group=".$userName);
            exit();
        }
        else
        {
            // checking if a section already exists with the given section

            $sqlquery = mysqli_query($conn,"SELECT * FROM groups where grpcode = '".$grpcode."' ");
            $checkempty = mysqli_fetch_assoc($sqlquery);

            if(empty($checkempty['members'])){
                $query = "UPDATE `groups` SET `members`='".$userName."' WHERE `grpcode` = '".$grpcode."' ";
                $result = mysqli_query($conn, $query);

                $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Students/project-list.php?&error=sqlerror");
                        exit();
                    }

                    else
                    {
                    
                        mysqli_stmt_bind_param($que, "ss", $userName, $action);
                        mysqli_stmt_execute($que);
                        mysqli_stmt_store_result($que);


                        header("Location: ../Students/project-list.php?&update_members=success");
                        exit();
                    }
            }
            
            else{

            
                $lead = explode(',',$que1['members']);
            
                // $arrayi = implode(",",$members);
            
                array_push($lead, $userName);
                $values  = implode(",", $lead);
                print_r($values) ;

                $query = "UPDATE `groups` SET `members`='".$values."' WHERE `grpcode` = '".$grpcode."' ";
                $result = mysqli_query($conn, $query);

                if (!$result)
                {
                    header("Location: ../Students/project-list.php?error=sqlerror");
                    exit();
                }
                else
                {
                        
                    $sql = "insert into activity_log(uidUsers, action) "
                    . "values (?,?)";
                    $que = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($que, $sql))
                    {
                        header("Location: ../Students/project-list.php?&error=sqlerror");
                        exit();
                    }

                    else
                    {
                    
                        mysqli_stmt_bind_param($que, "ss", $userName, $action);
                        mysqli_stmt_execute($que);
                        mysqli_stmt_store_result($que);


                        header("Location: ../Students/project-list.php?&update_members=success");
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


else
{
    header("Location: ../Students/project-list.php?");
    exit();
}