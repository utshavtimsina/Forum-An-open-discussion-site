
<!DOCTYPE html>
<html>
<head>
<style>
body{ background-color:LIGHTGREY;}
 .padding{ padding:15px; }

 select[name="faculty"]{ border:1px solid black;  background-color:black; font-size:20px; border-radius:5px; color:white;}
 select[name="semester"]{ border:1px solid black; background-color:black;  font-size:20px; border-radius:5px; color:white;}
 select[name="type"]{ border:1px solid black; background-color:black; font-size:20px; border-radius:5px; color:white;}
select[name="subject"]{ border:1px solid black; background-color:black; font-size:20px; border-radius:5px; color:white;}
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
<form action="faculty.php" method='POST'>
<table>
<tr><td class="padding">
	<select id='type' name='type' onChange='f(this.value)'>
	<option value="">-- Select TYPE --</option>
	<option  value='Notes'>Notes</option>
    <option value='Question'>Question</option></select></td>
    <td class="padding">
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
	</td></select>
<td class="padding">    
<select id='subject' name='subject' >
<option value='null'>-- Select subject --</option></select></td>
	<td><input type="submit" name="submit" id="submit"></td>
	</tr>
</table>

<br>
<?php include("check.php"); ?>
</form>	
 <script src="jquery.min.js"></script>
      <script src="bootstrap.min.js"></script>
      <script src="scripts.js"></script>
<script type="text/javascript">
function f(val){
//var x=document.GetElementById('type').value;
//alert(val);
if(val!='Notes'){
y=document.getElementById('subject');
y.style.display="none";
}
else{
	y=document.getElementById('subject');
y.style.display="inherit";

}

$(document).ready(function(){


$("#semester").on("change",function(){


var faculty=$("#faculty").val();
//alert(faculty);
var semester=$("#semester").val();
	$.ajax({
		method: "POST",
        url: "track.php",
       async: false,
        data: { faculty:faculty, semester:semester },
        dataType: "JSON",
        success: function(data){
//$("#subject").html("<option value=''>-- Select subject --</option>");
			for(var i=0;i<data.length;i++)
{
    var x="<option value="+data[i].subject+">"+data[i].subject+"</option>";

	 $("#subject").append(x);

}

		} 

});

})


$("#faculty").on("change",function(){


var faculty=$("#faculty").val();
//alert(faculty);
var semester=$("#semester").val();
	$.ajax({
		method: "POST",
        url: "track.php",
       async: false,
        data: { faculty:faculty, semester:semester },
        dataType: "JSON",
        success: function(data){
//$("#subject").html("<option value=''>-- Select subject --</option>");
			for(var i=0;i<data.length;i++)
{
    var x="<option value="+data[i].subject+">"+data[i].subject+"</option>";

	 $("#subject").append(x);

}

		} 

});

})






});






}

</script>
</BODY>
</html>