<?php  
require_once 'db_connect.php';
$str =$_POST['string'];
//$str="BE Computer - 1";
$str=explode('-',$str);
if($str[1]=='1'){
	$Sem='First';
}else{
	$Sem[1]='none';
}
//print_r($str);
//echo $str[1];
$Faculty=$str[0];
//$Sem-$str[1];
$subjectlist = array();     
$sql = "select count(Subject)total from subject where Faculty = '$Faculty'and Semester='$Sem'";

$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($result);
$total=$rows['total'];
//$total=parseInt($total);
$sql = "select * from subject where Faculty = '$Faculty'and Semester='$Sem'";
$result = mysqli_query($conn,$sql);
while($rows = mysqli_fetch_array($result)) 
{
	$subject=$rows['Subject'];
	$subjectlist[]= array('total' =>$total ,'subject'=>$subject );
   
}


echo json_encode($subjectlist);
?>