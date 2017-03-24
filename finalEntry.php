<?php
  $host='localhost';
  $user='id1169029_root';
  $pass='CSE@MCKVIE';
  $db='id1169029_quizzare';
  $connect=mysqli_connect($host,$user,$pass,$db);
  $team=$_POST['team'];
      $name=array();
      $dept=array();
      $roll=array();
      $year=array();
      $email=array();
      $allow1=$allow2=$allow3=1;
      for($i=0;$i<3;$i++){
        $name[]=$_POST['name'.$i];
        $dept[]=$_POST['dept'.$i];
        $year[]=$_POST['year'.$i];
        $roll[]=$_POST['roll'.$i];
        $email[]=$_POST['email'.$i];
      }

      $memcheck1="SELECT COUNT(*) as cc1 FROM table1 WHERE (table1.dept1='$dept[0]' and table1.year1='$year[0]' and table1.roll1='$roll[0]')or(table1.dept2='$dept[0]' and table1.year2='$year[0]' and table1.roll2='$roll[0]')or(table1.dept3='$dept[0]' and table1.year3='$year[0]' and table1.roll3='$roll[0]')";
      $memcheck2="SELECT COUNT(*) as cc2 FROM table1 WHERE (table1.dept1='$dept[1]' and table1.year1='$year[1]' and table1.roll1='$roll[1]')or(table1.dept2='$dept[1]' and table1.year2='$year[1]' and table1.roll2='$roll[1]')or(table1.dept3='$dept[1]' and table1.year3='$year[1]' and table1.roll3='$roll[1]')";
      $memcheck3="SELECT COUNT(*) as cc3 FROM table1 WHERE (table1.dept1='$dept[2]' and table1.year1='$year[2]' and table1.roll1='$roll[2]')or(table1.dept2='$dept[2]' and table1.year2='$year[2]' and table1.roll2='$roll[2]')or(table1.dept3='$dept[2]' and table1.year3='$year[2]' and table1.roll3='$roll[2]')";

      $mem1=mysqli_query($connect,$memcheck1);
      $mem2=mysqli_query($connect,$memcheck2);
      $mem3=mysqli_query($connect,$memcheck3);
      if( $mem1->fetch_object()->cc1>0)
      {
          $allow1=0;
          echo $name[0];
      }

      if( $mem2->fetch_object()->cc2>0)
      {
          $allow2=0;
          echo $name[1];
      }
      if( $mem3->fetch_object()->cc3>0)
      {
          $allow3=0;
          echo $name[2];

      }
      if($allow1!=0 && $allow2!=0 && $allow3!=0)
      {

        $sql = $connect->prepare("INSERT INTO table1(team,name1,dept1,year1,roll1,email1,
        name2,dept2,year2,roll2,email2,name3,dept3,year3,roll3,email3)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $sql->bind_param("ssssssssssssssss",$team,$name[0],$dept[0],$year[0],$roll[0],$email[0],$name[1],$dept[1],$year[1],$roll[1],$email[1],$name[2],$dept[2],$year[2],$roll[2],$email[2]);
        $sql->execute();

        echo "success";
      }
        mysqli_close($connect);
 ?>
