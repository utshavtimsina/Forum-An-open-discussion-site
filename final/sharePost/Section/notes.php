<?php
session_start();
?>

<html>
<head>
<style>
	
	table { width:100%; table-layout: fixed; }
	
	table:tr
	{

	
			//margin-top:10%;
		
		
	}
	td{ 
	     width:100px;
	     padding:20px;
		 word-break:break-all;
         /*white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipses;		 
		*/}
		td:hover
		{
			
		}
	
	.d { opacity:0.5; }
</style>
<title>Display</title>
</head>
<body>

	   <?php
            $faculty=$_GET["faculty"];
            $semester=$_GET['semester'];
            $subject=$_GET["subject"];
           	//$type=$_GET['type'];
			$db=mysqli_connect("localhost","root","","forum");
			$displayQuery="select * from question_banks where   program='$faculty' AND semester='$semester' AND subject='$subject' order by id desc";
			$doc=mysqli_query($db,$displayQuery);
			
			//print_r($row) ;
		
			$i=1;
			echo"<table><tr>";
			while($row=mysqli_fetch_array($doc))
			{
				
			  $filename=$row['name'];
			   $fileExt=explode('.',$filename);	
			   $fileActualExt=strtolower(end($fileExt));	
			   
              			   
			  if($fileActualExt=='doc' || $fileActualExt=='docx')
			 {
					
					echo"<td><img src='doc.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='files/".$row['name']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
			 }	
							 
			 elseif($fileActualExt=='pdf')
			 {
					
					echo"<td><img src='pdf.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='files/".$row['name']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
						
			 }					 
				elseif($fileActualExt=='pptx' || $fileActualExt=='ppt')
			   {
				   
					echo"<td><img src='ppt.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='files/".$row['name']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
					 
			   }
			

					elseif($fileActualExt=='rar' || $fileActualExt=='zip')
			   {
					
			       echo"<td><img src='compressed.jpg' height='50' width='50' class='shape'>";
				   echo "<br><h4>$filename</h4>";
				   echo"<a href='files/".$row['name']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
													 
								 
			  }
			 
			   elseif($fileActualExt=='jpg' || $fileActualExt=='jpeg' || $fileActualExt=='png')
			   {
				   
					echo "<td><a href='files/".$row['name']."'><img  height='50' width='50' src='files/".$row['name']."' class='shape'></a>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='files/".$row['name']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
												 
			  }
					if($i%7==0){
						$i=1;
						echo"</tr><tr>";
					}	else{
						
						$i++;		  
					}
			}
					
			
			echo"</tr></table"; 
	   ?>
</body>
</html> 