
<?php
   session_start();
 ?>
         
<?php
     
     if(!empty($_FILES['file']['name'])){
$db=mysqli_connect("localhost","root","","forum");
if(isset($_POST['submit']))

{	
	
	//$file= $_FILES['file'][$i];
	$fileName= $_FILES['file']['name'];
    $fileTmpName= $_FILES['file']['tmp_name'];	
    $fileSize= $_FILES['file']['size'];	
    $fileError= $_FILES['file']['error'];	
    $fileType= $_FILES['file']['type'];	
	$fileExt=explode('.',$fileName);
	$fileActualExt=strtolower(end($fileExt));
	$allowed=array('jpg','jpeg','png');
	$fileNewName=uniqid().'.'.$fileActualExt;
	if(in_array($fileActualExt,$allowed))
	{
		
		$target="Uploads/".basename($fileNewName);
		
	}
	else{
		echo"You cannot upload this type of file";
	
	exit();
	}
	$max=$_SESSION['max'];
	//uploading image to the database
	$query="insert into uploaded_images values ('$max','','$fileNewName')";
	mysqli_query($db,$query);
	if(move_uploaded_file($fileTmpName,$target))
	{
		header('location:index.php');
	}
	else
		header('location:index.php');
	


 // Now It is time To Display  profile of the User
 

                        
            
                    
		}



	}else{
		header('location:index.php');
	}
					 ?>                        
