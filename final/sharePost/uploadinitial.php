
<?php
   session_start();
 ?>
         
<?php
     
     if(!empty($_FILES['file']['name'])){
				$db=mysqli_connect("localhost","root","","forum");
				
					//$file= $_FILES['file'][$i];
					$fileName= $_FILES['file']['name'];
				    $fileTmpName= $_FILES['file']['tmp_name'];	
				    $fileSize= $_FILES['file']['size'];	
				    $fileError= $_FILES['file']['error'];	
				    $fileType= $_FILES['file']['type'];	
					$fileExt=explode('.',$fileName);
					$fileActualExt=strtolower(end($fileExt));
					$allowed=array('jpg','jpeg','png','JPG');
					$fileNewName=uniqid().'.'.$fileActualExt;
					if(in_array($fileActualExt,$allowed))
					{
						
						$target="Uploads/".basename($fileNewName);
						
					}
					else{
						echo"You cannot upload this type of file";
					
					exit();
					}
							
							$sql="select max(post_id)max from posts order by post_id desc ";
										$result=mysqli_query($db, $sql);
										$row=mysqli_fetch_assoc($result);
										$max=$row['max'];
										//echo $max;
					//uploading image to the database
					$query="insert into uploaded_images(question_id,reply_id,src) values ('$max','2','$fileNewName')";
					mysqli_query($db,$query);
					if(move_uploaded_file($fileTmpName,$target))
					{
						header('location:index.php');
						//echo"success";
					}
					else{
						//echo"failure";
						
						header('location:index.php');
					}
					


				 // Now It is time To Display  profile of the User
				 

				                        
				            
				                    
						



					}else{
						//echo"not found";
						header('location:index.php');
					}
					 ?>                        
