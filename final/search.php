<?php
require "db_connect.php";
$data=array();
if(isset($_POST['search'])){
	$search=$_POST['search'];
	if($search!=""){
	$sql="select DISTINCT * from member_table where username like'%$search%' limit 3";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
	   	$username=$row['username'];
	   		$id=$row['member_id'];
	   	//$resturant=$row['resturant'];
	   	$data[]=array("username"=>$username,"Id"=>$id);
	   }
	   echo json_encode($data);
	}else{
		$data[]=array("username"=>"","Id"=>"");
		echo json_encode($data);
	}
}
if(isset($_POST['needle'])){
		$needle=$_POST['needle'];
		if($needle!=""){
				$sql="select count(member_id)total  from member_table where username='$needle'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);

				if($row['total']>0){
					$sql="select member_id  from member_table where username='$needle'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$member_id=$row['member_id'];
					$data[]=array("member_id"=>$member_id);
	   			}else{
	   				$data[]=array("member_id"=>"0");

	   			}
	   		echo json_encode($data);
			
	}else{
		$data[]=array("member_id"=>"0");
		echo json_encode($data);
	}
}

?>