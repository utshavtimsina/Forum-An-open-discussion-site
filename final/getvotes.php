<?php  
require_once 'db_connect.php';
session_start();

if (isset($_POST['reply_id'])) {
	$reply_id=$_POST['reply_id'];

	$sql="select * from votes  where reply_id='$reply_id'";
		$resull=mysqli_query($conn,$sql);

		$voterows=[];
		while($voterow=mysqli_fetch_array($resull)){
			array_push($voterows, $voterow);
		}
		$upvote= 0;
		$upvote_st=0;
		$downvote_st=0;

		foreach ($voterows as $row) {
			if($row['upvote']){
				$upvote++;
			}
			if($row['member_id']==$_SESSION['uid']){
					$upvote_st=$row['upvote'];
					$downvote_st=$row['downvote'];
				}
		}

		$voteclass1=$voteclass2='';

		if($upvote_st!=$downvote_st){
			if($upvote_st){
				$voteclass1=' active';
			}else{
				$voteclass2=' active';
			}
		}

		$votediv = "<div class='btn-votes'><button type='button' class='btn btn-xs btn-upvote".$voteclass1."' value='".$upvote_st."'><span class='glyphicon glyphicon-thumbs-up'></span> | <span class='count'>".$upvote."</span></button><button type='button' class='btn btn-xs btn-link btn-downvote".$voteclass2."' value='".$downvote_st."'><span class='glyphicon glyphicon-thumbs-down'></span></button></div>";

		echo $votediv;
}
?>