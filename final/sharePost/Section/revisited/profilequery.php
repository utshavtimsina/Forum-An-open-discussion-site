<?php  
require_once 'db_connect.php';
?>
<?php
$memberId=$_POST['member_id'];

$data=array();
$temp=0;
if(isset($_POST['member_id'])){

		$sql="select count(question_id)total from  question_table where member_id='$memberId' ";
		$result=mysqli_query($conn,$sql);
	
	$rows=mysqli_fetch_assoc($result);
		$totalquestions=$rows['total'];



		$sql="select count(reply_id)total from  answer_table where member_id='$memberId' ";
		$result=mysqli_query($conn,$sql);
	
	$rows=mysqli_fetch_assoc($result);
		$totalanswers=$rows['total'];

	$sql="select * from  question_table where member_id='$memberId'  order by question_id desc ";
	$result=mysqli_query($conn,$sql);
	
	while($rows=mysqli_fetch_assoc($result)) { 
	//$reply_id= $rows["question_id"];
	$question_id= $rows["question_id"];
	//$member_id= $rows["member_id"];
	$question_text= $rows["question_text"];

	$sql="select * from  member_table where member_id='$memberId' ";
	$ok=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($ok);
	$thisusername=$rowss['username'];
	$thisprofile_pic=$rowss['profile_pic'];

	
	

	$sql="select count(reply_id)total from answer_table where question_id='$question_id'";
	$resul=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($resul);
	$total=$rowss["total"];
	
		if($temp==0){

	$data[] = array("totalanswers"=>$totalanswers,"totalquestions"=>$totalquestions,"thisusername"=>$thisusername,"thisprofile_pic"=>$thisprofile_pic,"question_id" => $question_id,"question_text"=>$question_text,"nmember_id"=>$memberId,"total"=>$total,);
			$temp++;
		}else {
			$data[] = array("question_id" => $question_id,"question_text"=>$question_text,"nmember_id"=>$memberId,"total"=>$total,);
	
		}

	
		if($total>0){
				$sql="select * from answer_table where question_id='$question_id'";
				$resul=mysqli_query($conn,$sql);
				while($rowss=mysqli_fetch_assoc($resul))
				{
					
				$downvote= $rowss["downvote"];
				$reply_text =$rowss["reply_text"];
				$reply_id =$rowss["reply_id"];
				$remember_id=$rowss["member_id"];
				$upvote= $rowss["upvote"];
				$date= $rows["date"];
				$sql="select * from member_table where member_id='$remember_id'";
				$resulttt=mysqli_query($conn,$sql);
				$rowsss=mysqli_fetch_array($resulttt);
				$username =$rowsss["username"];
				$profile_pic =$rowsss["profile_pic"];
				$data[] = array( "reply_id"=>$reply_id,"newmember_id"=>$remember_id,"upvote" => $upvote, "date" => $date ,"downvote" => $downvote,  "username" => $username,"profile_pic" => $profile_pic, "reply_text" => $reply_text);
				
				}
			}
}
	echo json_encode($data);
}

else{
	//echo "string1";
}

?>