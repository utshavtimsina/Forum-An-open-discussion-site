<?php
require"db_connect.php";
?>
<?php
$questionId=$_POST['questionId'];

$data=array();
if(isset($_POST['questionId'])){
	$sql="select * from  answer_table where question_id='$questionId' order by reply_id desc ";
	$result=mysqli_query($conn,$sql);
	
	while($rows=mysqli_fetch_assoc($result)) { 
	$reply_id= $rows["reply_id"];
	$question_id= $rows["question_id"];
	$member_id= $rows["member_id"];
	$reply_text= $rows["reply_text"];
	$upvote= $rows["upvote"];
	$downvote= $rows["downvote"];
	$date= $rows["date"];

	$a=$rows["member_id"];
	$sql="select * from member_table  where member_id='$a'";
	$resul=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($resul);
	$username =$rowss["username"];
	$profile_pic =$rowss["profile_pic"];
	$data[] = array("reply_id" => $reply_id, "question_id" => $question_id,  "member_id" => $member_id, "reply_text" => $reply_text, "upvote" => $upvote, "downvote" => $downvote, "date" => $date, "username" => $username,"profile_pic" => $profile_pic);

	}
	echo json_encode($data);
}

else{
	//echo "string1";
}

?>