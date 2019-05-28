<?php  
require_once 'db_connect.php';
session_start();

if (isset($_SESSION['uid'])) {
	$member_id=$_SESSION['uid'];
	$question_id=$_POST['question_id'];
	$reply_text = mysqli_real_escape_string($conn, $_POST['reply_text']);
	$date = date('Y-m-d');
	$image = NULL;
	$err='';


	if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0)
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 100000000)
			&& in_array($file_extension, $validextensions)) {
			if ($_FILES["file"]["error"] > 0)
			{
				$err= "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}
			else
			{		$uniqstr = uniqid();
					$sourcePath = $_FILES['file']['tmp_name']; 
					$targetPath = "uploads/".$uniqstr.'_'.$_FILES['file']['name']; 
					move_uploaded_file($sourcePath,$targetPath) ; 

					$image = $uniqstr.'_'.$_FILES["file"]["name"];
			}
		}
		else
		{
			$err = "<span id='invalid'>***Invalid file Size or Type***<span>";
		}
	}

	if(!empty($err)){
		echo $err;
	}else{
		$sql = "insert into answer_table(question_id ,reply_text ,member_id,date,image) values('$question_id','$reply_text','$member_id','$date','$image')";
		$result = mysqli_query($conn, $sql);

		if($result){
			echo 'Answer successfully Posted!';
		}else{
			echo 'Failed to post answer!';
		}
	}
}
?>