<?php  
require_once 'db_connect.php';
session_start();

if (isset($_SESSION['uid'])) {
	$member_id=$_SESSION['uid'];
	$reply_id=$_POST['reply_id'];
	$upvote=$_POST['upvote'];
	$downvote=$_POST['downvote'];
	$index=$_POST['index'];

	if($index){
		$downvote=!$downvote;
		if($upvote==$downvote && $downvote==1){
			$upvote=0;
		}
	}else{
		$upvote=!$upvote;
		if($upvote==$downvote && $downvote==1){
			$downvote=0;
		}
	}

	$sql = "select * from votes where reply_id='$reply_id' and member_id='$member_id'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1) {
		echo $id=mysqli_fetch_array($result)['id'];
		$sql = "update votes set reply_id='$reply_id' ,member_id='$member_id' ,upvote='$upvote',downvote='$downvote' where id='$id'";
		$result = mysqli_query($conn, $sql);
	}else{
		$sql = "insert into votes(reply_id ,member_id ,upvote,downvote) values('$reply_id','$member_id','$upvote','$downvote')";
		$result = mysqli_query($conn, $sql);
	}

	echo $result;
}
?>