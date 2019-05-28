<?php  
require_once 'db_connect.php';
session_start();

if (isset($_SESSION['uid'])) {
	$member_id=$_SESSION['uid'];
	$question_category=$_POST['question_category'];
	$question_text = mysqli_real_escape_string($conn, $_POST['question_text']);
	$date = date('Y-m-d');

	$sql = "insert into question_table(question_category ,question_text ,member_id,date) values('$question_category','$question_text','$member_id','$date')";
	$result = mysqli_query($conn, $sql);

	if($result){
		echo 'Question successfully Posted!';
	}else{
		echo 'Failed to post question!';
	}
}
?>