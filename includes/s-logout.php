<?php

if (isset($_POST['logout-submit']))
{
    
    require 'dbh.inc.php';
    $userName = $_POST['uid'];
    $action = $_POST['action'];
    
                    
    $sql = "INSERT INTO activity_log(uidUsers, action) "
    . "values (?,?)";
    $que = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($que, $sql))
    {
        header("Location: ../s-index.php?error=sqlerror");
        exit();
    }
    else
    {
    
    mysqli_stmt_bind_param($que, "ss", $userName, $action);
    mysqli_stmt_execute($que);
    mysqli_stmt_store_result($que);

    header("Location: logout.inc.php");
    exit();
    }                  
            
    
}
 else 
{
    header("Location: ../s-index.php");
    exit();
}