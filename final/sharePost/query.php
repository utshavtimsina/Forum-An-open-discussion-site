<?php
session_start();
?>

<?php
require"db_connect.php";
// fetch limited rows
if(isset($_POST['LIMIT'])){
	$limitText = " limit ".$_POST['LIMIT'];
}else{
	$limitText = "";
}

// fetch offset rows when scroll
if(isset($_POST['OFFSET'])){
	$offsetText = " offset ".$_POST['OFFSET'];
}else{
	$offsetText = "";
}
?>
<?php
if(!isset($_POST['id'])){
$data=array();


		$sql="select * from posts  order by post_id desc $limitText $offsetText";
		$result=mysqli_query($conn,$sql);		
				
				//echo $rows['question_id'];
				while($rows=mysqli_fetch_array($result)) 
				{					
							
						$post_id= $rows["post_id"];
						$post_category =$rows["post_category"];
						$post_text = $rows["post_text"];
						$member_id=$rows["member_id"];
						$likes=$rows["likes"];
						$unlikes =$rows["unlikes"];
						$date =$rows["date"];
						$isimage=$rows["image"];
						if($isimage=='1'){

							$sql="select * from uploaded_images  where question_id='$post_id'";
							$results=mysqli_query($conn,$sql);
							$rowss=mysqli_fetch_array($results);	
							$src1=$rowss['src'];
							
						}else{
					$src1='none';
						}
						//$a=$rows["member_id"];
						
							$sql="select * from member_table  where member_id='$member_id'";
							$results=mysqli_query($conn,$sql);
							$rowss=mysqli_fetch_array($results);	
							$username =$rowss["username"];
							$profile_pic =$rowss["profile_pic"];

						//$a=$rows["question_id"];
						$sql="select count(reply_id)total_replies from answer_table where question_id='$post_id'";
							$results=mysqli_query($conn,$sql);
							$rowss=mysqli_fetch_array($results);
							$total_replies =$rowss["total_replies"];

//*/
						$data[] = array("isimage"=>$isimage,"src1"=>$src1,"total_replies"=>$total_replies,"post_id" => $post_id,"post_text" => $post_text,  "member_id" => $member_id, "likes" => $likes, "unlikes" => $unlikes, "date" => $date, "username" => $username,"profile_pic" => $profile_pic);
						
				}
							echo json_encode($data);
				
			
		}
				
	

else {
	echo"where are you from you did it wrong";
	}

	mysqli_close($conn);
?>

