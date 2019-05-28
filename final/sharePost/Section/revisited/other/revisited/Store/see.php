<?php  
session_start();
if(isset($_POST['submit']))
	 {
	 $_SESSION["faculty"]=$_POST["faculty"];
	 $_SESSION["semester"]=$_POST["semester"]; 
     $_SESSION["subject"]=$_POST["subject"];
	  if(empty($_POST['faculty']) || empty($_POST['semester'])) 
	  {
		 
		 echo "<h1>Please select all the valid options</h1>";
      }
     
	 elseif($_SESSION['type']=="note"){
	     
		 header('location:NOTES.php');
	 }
    elseif($_SESSION['type']=="question")
    {
         header('location:QUESTIONS.php');
    }
	 }	
?>
	 
   