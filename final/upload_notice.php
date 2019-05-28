<?php
session_start();
if(isset($_FILES['file'])){
	$db=mysqli_connect("localhost","root","","forum");

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

		$target="uploads/notice/".basename($fileNewName);

	}
	else{
		echo"You cannot upload this type of file";
		exit();
	}

	$query="insert into notice_table(image) values('$fileNewName')";
	mysqli_query($db,$query);
	if(move_uploaded_file($fileTmpName,$target))
	{	
		header("location:index.php");		
	}
}
?>                        
