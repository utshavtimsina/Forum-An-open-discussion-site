<?php
$faculty=$_POST['faculty'];
$semester=$_POST['semester'];
      $db=mysqli_connect("localhost","root","","subject");
		$Query="select * from subject where Faculty='$faculty' AND Semester='$semester'";
     $result=mysqli_query($db,$Query);

$data=array();
     while($row=mysqli_fetch_array($result))
  {
          $subject=$row['Subject'];
          $data[]=array("subject"=>$subject);

  }

    echo json_encode($data);
?>