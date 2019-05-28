<?php  
require_once 'db_connect.php';
$sql = "select * from subjects where program = '".$_POST['program']."'";
$result = mysqli_query($conn,$sql);
$subjectlist = [];      
while($rows = mysqli_fetch_array($result)) 
{
   array_push($subjectlist, $rows);
}
$options= "<option value=''>Choose Subject</option>";
foreach ($subjectlist as $subject) {
	$options .= "<option value='".$subject['id']."'>".$subject['name']."</option>";
}
echo $options;
?>