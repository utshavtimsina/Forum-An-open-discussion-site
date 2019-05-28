<?php  
session_start();
if(isset($_POST['submit']))
	 {
     $_SESSION["type"]=$_POST["type"];
	 $_SESSION["faculty"]=$_POST["faculty"];
	 $_SESSION["semester"]=$_POST["semester"]; 
     $_SESSION["subject"]=$_POST["subject"];
	$c=$_SESSION['subject'];
	    if($_SESSION['type']=="note"){
			if(empty($_POST['faculty']) || empty($_POST['semester']) || empty($_POST['type']) ) 
	  {
		  
		 echo "<h1>Please select all the valid options</h1>";
		 
		  
      }
	    else
		{ 
             header('location:Files.php');
	    }
	  }  
		 
	 
    else
    {
		if(empty($_POST['faculty']) || empty($_POST['semester']) || empty($_POST['type'])) {
			
		echo "<h1>Please select all the valid options</h1>";
		}
		else {
         header('location:Files.php');
    }
	}
	 }	
?>
	 
   