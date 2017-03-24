<?php
  $host='localhost';
  $user='id1169029_root';
  $pass='CSE@MCKVIE';
  $db='id1169029_quizzare';
  $connect=mysqli_connect($host,$user,$pass,$db);
  //if($connect)
  //echo "Successfully connected";
  $team=$_POST['team'];
  //echo "$team";
  $teamcheck="SELECT COUNT(*) as count FROM table1 WHERE table1.team='$team'";
  $result=mysqli_query($connect,$teamcheck);
  if( $result->fetch_object()->count>0) {
    echo "fail";
  }
    mysqli_close($connect);
 ?>
