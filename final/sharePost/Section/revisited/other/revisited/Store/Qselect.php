<?php 
   session_start();
    $_SESSION["type"]="question";
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
body{ background-color:LIGHTGREY;}
 .padding{ padding:15px; }

 select[name="faculty"]{ border:1px solid black;  background-color:black; font-size:20px; border-radius:5px; color:white;}
 select[name="semester"]{ border:1px solid black; background-color:black;  font-size:20px; border-radius:5px; color:white;}
 select[name="type"]{ border:1px solid black; background-color:black; font-size:20px; border-radius:5px; color:white;}
#submit
{ 
  box-shadow: 0px 5px 10px black ;
  font-size:20px;
  color:white;
  height:30px; width:100px;
  background-color:black;
  border: 2px solid black;
  border-radius:5px;
  
}
#submit:active
{
	box-shadow: 0px 0px 0px ;
    transform: translateY(4px);
}
 option[value="1"]{ background-color:yellow; }
 option[value="2"]{ background-color:yellow; }
 option[value="3"]{ background-color:yellow; }
 option[value="4"]{ background-color:yellow; }
 option[value="5"]{ background-color:yellow; }
 option[value="6"]{ background-color:yellow; }
 option[value="7"]{ background-color:yellow; }
 option[value="8"]{ background-color:yellow; }
</style>
<title>CATEGORY</title>
</head>
<BODY>
<form action="Qselect.php" method='POST'>
<table>
<tr><td class="padding">
	<select id='faculty' name='faculty'>
	<option value="">-- Select Faculty --</option>
	<option value='BE Computer'>BE Computer</option>
    <option value='BCA'>BCA</option>
    <option value='BIT'>BIT</option>
    <option value='BBA'>BBA</option>
    <option value='BE Civil'>BE Civil</option>
	</select></td>
	
	<td class="padding">
	
	<select id='semester' name='semester'>
	<option value="">-- Select Semester --</option>
	<option value='First'>First</option>
    <option value='Second'>Second</option>
    <option value='Third'>Third</option>
    <option value='Fourth'>Fourth</option>
    <option value='Fifth'>Fifth</option>
	<option value='Sixth'>Sixth</option>
	<option value='Seventh'>Seventh</option>
	<option value='Eighth'>Eighth</option>
	</select></td>
	<td><input type="submit" name="submit" id="submit"></td>
	</tr>
</table>
<br>
<?php include("see.php"); ?>
</form>	

</BODY>
</html>