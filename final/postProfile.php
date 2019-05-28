<?php
session_start();
if(isset($_FILES['file'])){
	$db=mysqli_connect("localhost","root","","forum");

	$uid=$_POST['u_id'];
	$fileName= $_FILES['file']['name'];
	$fileTmpName= $_FILES['file']['tmp_name'];	
	$fileSize= $_FILES['file']['size'];	
	$fileError= $_FILES['file']['error'];	
	$fileType= $_FILES['file']['type'];	
	$fileExt=explode('.',$fileName);
	$fileActualExt=strtolower(end($fileExt));
	$allowed=array('jpg','jpeg','png','JPG');
	$fileNewName=uniqid().'.'.$fileActualExt;
	if(in_array($fileActualExt,$allowed))
	{

		$target="images/".basename($fileNewName);

	}
	else{
		echo"You cannot upload this type of file";
		exit();
	}

	echo $query="update member_table set profile_pic='$fileNewName' where member_id='$uid'";
	mysqli_query($db,$query);
	if(move_uploaded_file($fileTmpName,$target))
	{	
		$_SESSION['profile_pic'] = $fileNewName;
		if (isset($_COOKIE['remember'])) {
			setcookie('profile_pic', $fileNewName, time() + (86400 * 30), "/");
		}
		header("location:profile.php?id=$uid");
		
	}
}
?>                        
