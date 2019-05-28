<?php  
require_once 'db_connect.php';

$sql = "select * from category_table";
$result = mysqli_query($conn,$sql);

$categorylist = [];      
while($rows = mysqli_fetch_array($result)) 
{
   array_push($categorylist, $rows);
}
?>