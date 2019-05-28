<?php session_start(); ?>
<?php
$type=$_SESSION["type"];
$faculty=$_SESSION["faculty"];
$semester=$_SESSION["semester"]; 
$subject=$_SESSION["subject"];
$db=mysqli_connect("localhost","root","","files");
$errors = array();
if(isset($_POST['submit']))
{
	//echo $_FILES['file']['name'];
	if(isset($_FILES['file']['name']))
	{
    	
	
	foreach($_FILES['file']['name'] as $i=>$filename)
	{
	//$file= $_FILES['file'];
	$fileName= $_FILES['file']['name'][$i];
    $fileTmpName= $_FILES['file']['tmp_name'][$i];	
    $fileSize= $_FILES['file']['size'][$i];	
	
    $fileError= $_FILES['file']['error'][$i];	
    $fileType= $_FILES['file']['type'][$i];	
	$fileExt=explode('.',$fileName);
	$fileActualExt=strtolower(end($fileExt));
	$allowed=array('jpg','jpeg','png','pdf','docx','doc','pptx','ppt');
	if(in_array($fileActualExt,$allowed))
	{
		
		$target="FILES/".basename($fileName);
		
	}
	else
		exit("You cannot upload this type of file");
	
	}
	//uploading document to the database
	$query="insert into documents(Type,Faculty,Semester,Subject,FileName) values('$type','$faculty','$semester','$subject','$fileName')";
	mysqli_query($db,$query);
	if(move_uploaded_file($fileTmpName,$target))
	{
		echo"File was successfully uploaded<br>";
		if($_SESSION['type']=='Notes')
		{
			header('location:NOTES.php');
		}
		else
		{
			header('location:QUESTIONS.php');
		}
	}
	else
		exit("There was some problem uploading the file");
	

}
else exit("Please choose at least one file");
}
 // Now It is The time To Display The documents of the User
 

                       
            /*
             if($fileActualExt=='doc' || $fileActualExt=='docx')
			 {
			        $displayQuery="select * from documents where FileName='$fileName'";
	                 $files=mysqli_query($db,$displayQuery);
	                 while($row=mysqli_fetch_array($files))
	                 {
						 echo"<img src='doc.png' height='100' width='100'><br>";
		                echo "$fileName<br>";
					  echo"<br><a href='FILES/".$row['FileName']."' download>DOWNLOAD</a><br>";
					 }	
			 }					 
			 if($fileActualExt=='pdf')
			 {
			        $displayQuery="select * from documents where FileName='$fileName'";
	                 $files=mysqli_query($db,$displayQuery);
	                 while($row=mysqli_fetch_array($files))
	                 {
						 echo"<img src='pdf.png' height='100' width='100'><br>";
		                echo "$fileName";
					  echo"<br><a href='FILES/".$row['FileName']."' download>DOWNLOAD</a><br>";
					 }	
			 }					 
                if($fileActualExt=='pptx' || $fileActualExt=='ppt')
			   {
			        $displayQuery="select * from documents where FileName='$fileName'";
	                 $files=mysqli_query($db,$displayQuery);
	                 while($row=mysqli_fetch_array($files))
	                 {
						 echo"<img src='ppt.png' height='100' width='100'><br>";
		                echo "$fileName";
					  echo"<br><a href='FILES/".$row['FileName']."' download>DOWNLOAD</a><br>";
					 }	        					 
			 }
}
}	*/
 ?>                        
	