<?php
  
  // Creates DateTime objects
  $date1 = strtotime('03/19/2022');
  $date2 = strtotime("now");
  

  if ($date1 < $date2){
      echo 'Overdue';
  }
  else{
    echo 'Not';
  }
  
?>