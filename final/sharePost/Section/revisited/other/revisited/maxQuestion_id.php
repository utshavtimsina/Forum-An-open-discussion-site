<?php
require"db_connect.php";
?>
<?php
$sql="select count(question_id)items from question_table ";
$result=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($result)) 
echo $rows['items'];
?>