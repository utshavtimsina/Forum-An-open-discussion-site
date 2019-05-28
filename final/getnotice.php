<?php  
require_once 'db_connect.php';

$sql = "select * from notice_table  order by id desc limit 2";
$result = mysqli_query($conn,$sql);

$imagelist = [];   

while($rows = mysqli_fetch_array($result)) 
{
  array_push($imagelist, $rows);
}
?>