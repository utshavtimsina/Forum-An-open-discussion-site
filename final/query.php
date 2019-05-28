<?php
session_start();
require"db_connect.php";

// fetch limited rows
if(isset($_POST['LIMIT'])){
	$limitText = " limit ".$_POST['LIMIT'];
}else{
	$limitText = "";
}

// fetch offset rows when scroll
if(isset($_POST['OFFSET'])){
	$offsetText = " offset ".$_POST['OFFSET'];
}else{
	$offsetText = "";
}

if(isset($_POST['key'])){
	$category=$_POST['key'];
	$sql = "select id from category_table where category='$category'";
	$result = mysqli_query($conn,$sql);   
	$rows = mysqli_fetch_array($result);
	$id=$rows['id'];
	$value='=';
	$key=$id;
	//$offsetText = " offset ".$_POST['OFFSET'];
}else{
	$value='>';
	$key='0';
	//$offsetText = "";
}

$sql="select * from question_table having question_category $value '$key'   order by question_id desc $limitText $offsetText";
$result=mysqli_query($conn,$sql);		

$panel='';

while($rows=mysqli_fetch_array($result)) 
{	
	$question_id= $rows["question_id"];
	$question_category =$rows["question_category"];
	$question_text = $rows["question_text"];
	$member_id=$rows["member_id"];
	$date =$rows["date"];
	$a=$rows["member_id"];

	$sql="select * from member_table  where member_id='$a'";
	$results=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($results);	
	$username =$rowss["username"];
	$profile_pic =$rowss["profile_pic"];

	$a=$rows["question_id"];
	$sql="select count(reply_id)total_replies from answer_table where question_id='$a'";
	$results=mysqli_query($conn,$sql);
	$rowss=mysqli_fetch_array($results);
	$total_replies =$rowss["total_replies"];

	if (isset($_SESSION['uid'])) {
		$answer_form = "<form method='post' class='answer-form' enctype='multipart/form-data'><div class='form-group'><textarea class='form-control' maxlength='1800' name='answer' rows='7' placeholder='Typer your answer...' required></textarea></div><input type='submit' class='btn btn-primary btn-sm' name='post_answer' value='Post Answer'><input type='file' name='file' class='input-image'></form>";
	}else{
		$answer_form = "You must <a href='login/getIN.php'>login</a> first.";
	}

	$panel .= "<div class='panel'><div class='panel-heading'><a href='profile.php?id=".$member_id."' class='asker-img pull-left'><img src='images/".$profile_pic."' class='img-circle' width='40' height='40'></a><div class='panel-heading-right'><h2><div style='display: inherit;' class='questions' id='".$question_id."'>".$question_text."</div></h2><div class='asker-info'><a href='profile.php?id=".$member_id."'> <span class='glyphicon glyphicon-user'></span> <div class='asker-name' style='display: inherit;' id='".$member_id."'>".$username."</div></a><a href='#' class='btn-toggle-answer-body'>Answers(<div style='display: inline;' class='answer-quantity'>".$total_replies."</div>)</a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span><div style='display: inline;' class='question-date'> ".$date."</div></span></div></div><div class='write-answer-block'>".$answer_form."</div></div><div class='panel-body answer-body'> </div></div>";
}
echo $panel;
?>

