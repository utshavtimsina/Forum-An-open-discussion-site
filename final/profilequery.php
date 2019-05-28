<?php  
require_once 'db_connect.php';

$memberId=$_POST['member_id'];

$fut=$memberId;
$data=array();

if(isset($_POST['member_id'])){
	$sql="select * from  member_table where member_id='$fut' ";
	$ok=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($ok);
	$thisusername=$rowss['username'];
	$thisprofile_pic=$rowss['profile_pic'];
	$thisuser_id=$rowss['member_id'];

	$sql="select count(question_id)total from  question_table where member_id='$memberId' ";
	$result=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_assoc($result);
	$totalquestions=$rows['total'];

	$sql="select count(reply_id)total from  answer_table where member_id='$memberId' ";
	$result=mysqli_query($conn,$sql);	
	$rows=mysqli_fetch_assoc($result);
	$totalanswers=$rows['total'];

	$data['userinfo'] = array("totalquestions"=>$totalquestions,"totalanswers"=>$totalanswers,"thisuser_id"=>$thisuser_id,"thisprofile_pic"=>$thisprofile_pic,"thisusername"=>$thisusername,);
	$data['questions']=[];

	if($totalquestions>0){
		$sql="select * from  question_table where member_id='$memberId' order by question_id desc";
		$result=mysqli_query($conn,$sql);

		while($rows=mysqli_fetch_assoc($result)) {
			$question_id= $rows["question_id"];
			$question_text= $rows["question_text"];

			$sql="select count(reply_id)total_replies from  answer_table where question_id='$question_id'"; 
			$result2=mysqli_query($conn,$sql);
			$total_replies=mysqli_fetch_assoc($result2)['total_replies'];

			array_push($data['questions'], array("question_id" => $question_id,"question_text"=>$question_text,"total_replies"=>$total_replies));
		}
	}
	echo json_encode($data);
}
?>