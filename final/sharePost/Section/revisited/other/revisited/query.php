<?php
session_start();
?>

<?php
require"db_connect.php";
?>
<?php
$nextQuestion=$_POST['LIMITS'];

if(!isset($_POST['id'])){
$data=array();


		$sql="select * from question_table where question_id < $nextQuestion order by question_id desc LIMIT 1 ";
		$result=mysqli_query($conn,$sql);
		
				
				//echo $rows['question_id'];
				while($rows=mysqli_fetch_array($result)) 
				{
						
							
						$question_id= $rows["question_id"];
						$question_category =$rows["question_category"];
						$question_text = $rows["question_text"];
						$member_id=$rows["member_id"];
						$upvote =$rows["upvote"];
						$downvote =$rows["downvote"];
						$date =$rows["date"];
						$a=$rows["member_id"];
						
							$sql="select * from member_table  where member_id='$a'";
							$results=mysqli_query($conn,$sql);
							$rowss=mysqli_fetch_array($results);	
							$username =$rowss["username"];
							$profile_pic =$rowss["profile_pic"];

						$a=$rows["question_id"];
						$sql="select count(reply_id)total_replies from answer_table where question_id='$a'";
							$results=mysqli_query($conn,$sql);
							$rowss=mysqli_fetch_array($results);
							$total_replies =$rowss["total_replies"];


						$data[] = array("question_id" => $question_id,"question_text" => $question_text,  "member_id" => $member_id, "upvote" => $upvote, "downvote" => $downvote, "date" => $date, "username" => $username,"profile_pic" => $profile_pic,"total_replies" => $total_replies );
						
				}
							echo json_encode($data);
				
			
		}
				
	

else {
	echo"where are you from you did it wrong";
	}

	mysqli_close($conn);
?>

