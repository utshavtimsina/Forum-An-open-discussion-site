<?php
require_once "db_connect.php";
session_start();

$_POST['category']='';
//$isimage=$_POST['imagepresent'];


//$_SESSION['isimage']=$isimage;	

if(!isset($_POST['category'])|!isset($_POST['newQuestion'])|!isset($_POST['member_id'])){

//header('location:index.php');

}else{
	$data= array( );
	$category=$_POST['category'];
	$question=$_POST['newQuestion'];
	$id=$_SESSION['uid'];

	if($_POST["imagepresent"]=='yes')
		$imagesource='1';
	else
		$imagesource='0';
	//$imagesource=$_POST["imagepresent"];
	$date=date("Y-m-d");


	
				$sql="insert into posts(post_category,post_text,member_id,likes,unlikes,date,image) values ('$category','$question','$id','0','0','$date','$imagesource')";
					if (mysqli_query($conn, $sql)) {
						//$sql="select max(question_id)max from question_table order by question_id desc ";
						//$result=mysqli_query($conn, $sql);
						//$row=mysqli_fetch_assoc($result);
						//$_SESSION['max']=$row['max'];
					//	$data[]= array('max' => $row['max'] );
				   // echo json_encode($data);

										}
	
				}


?>