<?php
session_start();
require"db_connect.php";

$questionId=$_POST['questionId'];

$answer='';

if(!empty($questionId)){
	$sql="select * from  answer_table where question_id='$questionId' order by reply_id";
	$result=mysqli_query($conn,$sql);
	
	while($rows=mysqli_fetch_assoc($result)) { 
		$reply_id= $rows["reply_id"];
		$question_id= $rows["question_id"];
		$member_id= $rows["member_id"];
		$reply_text= $rows["reply_text"];
		$date= $rows["date"];
		$image=$rows["image"];

		if($image){
			$imagediv = "<div class='reply_img'><img src='uploads/".$image."' class='img-responsive'></div>";
		}else{
			$imagediv = '';
		}
		if(strlen($reply_text)>100){
			$les_text=substr($reply_text,0,100);
			$more_text=substr($reply_text,100);
			$reply_text=$les_text."<span class='ellipse'>...</span>"."<span class='more_text'>".$more_text."</span><br><a href='#' class='btn_read_more'>read more</a>";
		}

		$a=$rows["member_id"];
		$sql="select * from member_table  where member_id='$a'";
		$resul=mysqli_query($conn,$sql);
		$rowss=mysqli_fetch_array($resul);
		$username =$rowss["username"];
		$profile_pic =$rowss["profile_pic"];

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
			if(isset($_SESSION['uid'])){
				if($row['member_id']==$_SESSION['uid']){
					$upvote_st=$row['upvote'];
					$downvote_st=$row['downvote'];
				}
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

		if(isset($_SESSION['uid'])){
			// $commentDiv = "<div class='comment'><a href='profile.html' class='pull-left'><img src='images/".$profile_pic."' class='img-circle' width='22' height='22'></a> <form class='navbar-form'><div class='form-group'> <input type='text' class='form-control' placeholder='Add comment...'></div><button type='submit' class='btn btn-primary btn-xs'>Submit</button></form></div>";
			$votediv = "<div class='btn-votes'><button type='button' class='btn btn-xs btn-upvote".$voteclass1."' value='".$upvote_st."'><span class='glyphicon glyphicon-thumbs-up'></span> | <span class='count'>".$upvote."</span></button><button type='button' class='btn btn-xs btn-link btn-downvote".$voteclass2."' value='".$downvote_st."'><span class='glyphicon glyphicon-thumbs-down'></span></button></div>";
		}else{
			$votediv='';
			// $commentDiv = '';
		}

		$answer .= "<div class='media'> <a href='profile.php?id=".$a."' class='pull-left'><img src='images/".$profile_pic."' width='30' height='30' class='media-object img-circle'></a> <div class='media-body'><h4 class='media-heading' id='".$member_id."'>".$username."&nbsp; <small>".$date."</small></h4> <div class='answer' id='".$reply_id."'>".$reply_text."</div>".$imagediv."</div>".$votediv."</div>";
	}

	if($answer){
		echo $answer;
	}else{
		echo 'No answers avilable!';
	}
}
?>