<?php
include 'dbh.inc.php';

// if(count($_POST)>0){
// 	if($_POST['type']==1){
// 		$taskname=$_POST['taskname'];
// 		$taskmember=$_POST['taskmember'];
// 		$tduration=$_POST['tduration'];
// 		$tend=$_POST['tend'];
// 		$sql = "INSERT INTO `tasks`( `taskname`, `taskmember`,`tduration`,`tend`) 
// 		VALUES ('$taskname','$taskmember','$tduration','$tend')";
// 		if (mysqli_query($conn, $sql)) {
// 			echo json_encode(array("statusCode"=>200));
// 		} 
// 		else {
// 			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// 		}
// 		mysqli_close($conn);
// 	}
// }
// if(count($_POST)>0){
	// if($_POST['type']==2){
		if (isset($_POST['update'])){

			require 'dbh.inc.php';
			$id=$_POST['id'];
			$taskname=$_POST['taskname'];
			$taskmember=$_POST['taskmember'];
			$tduration=$_POST['tduration'];
			$tend=$_POST['tend'];

			if (empty($status))
			{
				header("Location: ../Professors/collaboration-board.php?projname=?error=emptyfields&uid=");
				exit();
			}

			else
			{
				$sql = "UPDATE `tasks` SET `taskname`='$taskname',`taskmember`='$taskmember',`tduration`='$tduration',`tend`='$tend' WHERE id=$id";
				if (mysqli_query($conn, $sql)) {
					echo json_encode(array("statusCode"=>200));
				} 
				else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
    
		}
		
		
	// }
// }
// if(count($_POST)>0){
// 	if($_POST['type']==3){
// 		$id=$_POST['id'];
// 		$sql = "DELETE FROM `tasks` WHERE id=$id ";
// 		if (mysqli_query($conn, $sql)) {
// 			echo $id;
// 		} 
// 		else {
// 			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// 		}
// 		mysqli_close($conn);
// 	}
// }
// if(count($_POST)>0){
// 	if($_POST['type']==4){
// 		$id=$_POST['id'];
// 		$sql = "DELETE FROM tasks WHERE id in ($id)";
// 		if (mysqli_query($conn, $sql)) {
// 			echo $id;
// 		} 
// 		else {
// 			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// 		}
// 		mysqli_close($conn);
// 	}
// }

?>