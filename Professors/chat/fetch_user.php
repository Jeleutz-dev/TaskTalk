<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM user 
WHERE idUsers != '".$_SESSION['userId']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<ul class="right_chat list-unstyled list">
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['idUsers'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="message" style="float: right; font-size:9px; color: green;">Online</span>';
	}
	else
	{
		// $status = '<span class="label label-danger">Offline</span>';
		$status = '<span class="message" style="float: right; font-size:9px; color: red;">Offline</span>';
	}
	$output .= '
	
		<li class="online">
			<a href="javascript:void(0);">
				<div class="media">
					<img class="media-object" src="../../uploads/'.$row["userImg"].'" alt="">
					<div class="media-body">
						<span class="name"><a data-touserid="'.$row['idUsers'].'" data-tousername="'.$row['uidUsers'].'" data-tofullname="'.$row['f_name'].' '.$row['l_name'].'" title="Message with '.($row['f_name'].' '.$row['l_name']). '" class="start_chat" href="#" style="font-color:#000;"><i class="bi bi-trash"></i>'.($row['f_name'].' '.$row['l_name']). ' '.count_unseen_message($row['idUsers'], $_SESSION['userId'], $connect).' '.fetch_is_type_status($row['uidUsers'], $connect).'</a></span>
						<span>'.$status.'</span>
					</div>
				</div>
			</a>                            
		</li>
	
		
	';
}

$output .= '</ul>';

echo $output;

?>