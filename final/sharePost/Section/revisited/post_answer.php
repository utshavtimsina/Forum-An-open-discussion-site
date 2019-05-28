<?php  
require_once 'db_connect.php';
$member_id=$_POST['member_id'];
$question_id=$_POST['question_id'];
$reply_text = mysqli_real_escape_string($conn, $_POST['reply_text']);
$date = date('Y-m-d');

$sql = "insert into answer_table(question_id ,reply_text ,member_id,date) values('$question_id','$reply_text','$member_id','$date')";
$result = mysqli_query($conn, $sql);

if($result){
   echo 'Answer successfully Posted!';
}else{
   echo 'Failed to post answer!';
}
?>