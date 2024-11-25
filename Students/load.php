<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=tasktalk', 'root', '');

$data = array();

$query = "SELECT * FROM events WHERE user='2018-00043-SJ-0'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'user'   => $row["user"]
 );
}

echo json_encode($data);

?>