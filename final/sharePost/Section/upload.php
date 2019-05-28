<?php
require_once 'db_connect.php';
$programlist ;      
$sql = "select distinct Faculty from subject";
$result = mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($result)) 
{
   $faculty= $rows['Faculty'];
   $programlist[]=array('Faculty'=> $faculty);
}

$err=array();
if (isset($_POST['upload'])) {
   if (isset($_POST['program']) && !empty($_POST['program'])) {
      $program = $_POST['program'];
   }else{
      $err['program'] = 'Please Choose Program';
   }

  /*  if (isset($_POST['type']) && !empty($_POST['type'])) {
      $type = $_POST['type'];
   }else{
      $err['type'] = 'Please Choose type';
   }*/

   if (isset($_POST['subject']) && !empty($_POST['subject'])) {
      $subject = $_POST['subject'];
   }else{
      $err['subject'] = 'Please Choose Subject';
   }

   if (isset($_POST['semester']) && !empty($_POST['semester'])) {
      $semester = $_POST['semester'];
   }else{
      $err['semester'] = 'Please Choose Semester';
   }

   if (!empty($_FILES['question_bank']['name']) ) {

   		$fileName= $_FILES['question_bank']['name'];
	   $fileTmpName= $_FILES['question_bank']['tmp_name'];	
	  //  $fileSize= $_FILES['question_bank']['size'];	
	   // $fileError= $_FILES['question_bank']['error'];	
	   // $fileType= $_FILES['question_bank']['type'];	
   		$target_dir = "files/";
		$target_file = $target_dir . basename($_FILES["question_bank"]["name"]);
		$uploadOk = 1;
		$fileActualExt = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//	$fileExt=explode('.',$fileName);
		//$fileActualExt=strtolower(end($fileExt));
	    $allowed=array('jpg','jpeg','png','JPG','pdf','txt','docx','doc');
		//$fileNewName=uniqid().'.'.$fileActualExt;

		

      //$needle=$_FILES['question_bank']['type'];
      if(in_array($fileActualExt,$allowed)){
         //$question_bank = $_FILES['question_bank']['name'];  
        // $fileTmpName= $_FILES['question_bank']['tmp_name'];
        
         move_uploaded_file($fileTmpName,$target_file);      
      }else{
      	// $question_bank = $_FILES['question_bank']['name'];  
        // $fileTmpName= $_FILES['question_bank']['tmp_name'];
       //  $target="files/".basename($question_bank);
      //   move_uploaded_file($fileTmpName,$target);   
         $err['question_bank'] = 'File format did not matched.';
      }
   }else{
      $err['question_bank'] = 'Please Upload Question Bank';
   }

   $created_by = 1;

   if(count($err)==0){
      $sql = "insert into question_banks(program ,subject ,semester, name, created_by) values('$program', '$subject', '$semester', '$fileName', $created_by)";
      $result = mysqli_query($conn, $sql);
      if($result){
         $suc_msg = 'Question Bank Uploaded Successfully!!!';
      }else{
         
      }
   }else{
   	$err_msg = 'Failed to Upload Question Bank';
   }
}
?>

<?php require_once 'header.php' ?>

<div class="container">
   <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-7">
      	 <?php if (isset($suc_msg)) { ?>
                  <div class="alert alert-success"><?php echo $suc_msg; ?></div>
               <?php } ?>
               <?php if (isset($err_msg)) { ?>
                  <div class="alert alert-danger"><?php echo $err_msg; ?></div>
               <?php } ?>
      		<div class="panel panel-default">
            	<div class="panel-heading"><h2>View Notes|| Questions</h2></div>
            		<div class="panel-body">
      					<button type="button" class="btn btn-default btn-lg btn-block note" data-toggle="collapse" data-target="#Notes" aria-expanded="false" aria-controls="Notes">Notes</button>
      					<div class="collapse" id="Notes">
  							<div class="col-md-12">
  									<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Notes-BeComputer" aria-expanded="false" aria-controls="Notes-BeComputer">BE Computer</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Notes-BeComputer">
		  												
		  												
		  										</div>
		  								</div>
		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Notes-BeCivil" aria-expanded="false" aria-controls="Notes-BeCivil">BE Civil</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Notes-BeCivil">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Notes-BIT" aria-expanded="false" aria-controls="Notes-BIT">BIT</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Notes-BIT">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Notes-BCA" aria-expanded="false" aria-controls="Notes-BCA">BCA</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Notes-BCA">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Notes-BBA" aria-expanded="false" aria-controls="Notes-BBA">BBA</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Notes-BBA">
		  												
		  												
		  										</div>
		  								</div>
      						</div>
						</div>
        				<button type="button" class="btn btn-default btn-lg btn-block question" data-toggle="collapse" data-target="#Questions" aria-expanded="false" aria-controls="Questions">Questions</button>

        				<div class="collapse" id="Questions">
  							<div class="col-md-12">
  									<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Questions-BeComputer" aria-expanded="false" aria-controls="Questions-BeComputer">BE Computer</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Questions-BeComputer">
		  												
		  												
		  										</div>
		  								</div>
		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Questions-BeCivil" aria-expanded="false" aria-controls="Questions-BeCivil">BE Civil</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Questions-BeCivil">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Questions-BIT" aria-expanded="false" aria-controls="Questions-BIT">BIT</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Questions-BIT">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Questions-BCA" aria-expanded="false" aria-controls="Questions-BCA">BCA</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Questions-BCA">
		  												
		  												
		  										</div>
		  								</div>

		  							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#Questions-BBA" aria-expanded="false" aria-controls="Questions-BBA">BBA</button>
  										<div class="col-md-12">
		  										<div class="collapse" id="Questions-BBA">
		  												
		  												
		  										</div>
		  								</div>
      						</div>
						</div>

					</div>
				</div>

        <?php if (isset($_SESSION['uid']) && ($_SESSION['uid']==21 || $_SESSION['uid']==23 || $_SESSION['uid']==24)) { ?>
				<div class="well well-lg text-center">OR</div>

         <div class="panel panel-default">
            <div class="panel-heading"><h2>Upload Notes||Questions</h2></div>
            <div class="panel-body">
               <?php if (isset($suc_msg)) { ?>
                  <div class="alert alert-success"><?php echo $suc_msg; ?></div>
               <?php } ?>
               <?php if (isset($err_msg)) { ?>
                  <div class="alert alert-danger"><?php echo $err_msg; ?></div>
               <?php } ?>
               <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="type" id=type>
                     <option value="">Choose Type</option>
                     <option value="note">Note</option>
                     <option value="question">Question</option>
                  </select>
                 
               </div>
               
               <form action="upload.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Program</label>
                     <select class="form-control" name="program" id="faculty">
                       <option value="">Choose Program</option>
                       <?php foreach ($programlist as $pl) { ?>
                       <option value="<?php echo $pl['Faculty'] ?>"><?php echo $pl['Faculty'] ?></option>
                       <?php } ?>
                    </select>
                    <?php if (isset($err['program'])) { echo $err['program']; } ?>
                 </div>
                 <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control" name="semester" id="semester">
                     <option value="">Choose Semester</option>
                     <option value="First">First</option>
                     <option value="2nd">2nd</option>
                     <option value="3rd">3rd</option>
                     <option value="4th">4th</option>
                     <option value="5th">5th</option>
                     <option value="6th">6th</option>
                     <option value="7th">7th</option>
                     <option value="8th">8th</option>
                  </select>
                  <?php if (isset($err['semester'])) { echo $err['semester']; } ?>
               </div>
                 <div class="form-group">
                  <label>Subject</label>
                  <select class="form-control" name="subject" id=subject>
                     <option value="">Choose Subject</option>
                  </select>
                  <?php if (isset($err['subject'])) { echo $err['subject']; } ?>
               </div>
               
               <div class="form-group">
                  <label>Question Bank</label>
                  <input type="file" class="form-control" name="question_bank">
                  <?php if (isset($err['question_bank'])) { echo $err['question_bank']; } ?>
               </div>
               <div class="text-center"><input type="submit" class="btn btn-primary" name="upload" value="Upload"></div>
            </form>
         </div>
      </div>          
        <?php } ?>
   </div>
   <div class="col-md-3">

   </div>
</div>
</div>

<?php require_once 'footer.php' ?>
<script>
	var count=0; 
	var x;
	notesloaded=0;
	questionloaded=0;
	var programme=['BeComputer','BCA',"BBA",'BIT','BeCivil'];
   $(document).ready(function(){


   	$("#semester").on("change",function(){


	var faculty=$("#faculty").val();
	var semester=$("#semester").val();
	//alert(semester);
		$.ajax({
			method: "POST",
			url: "track.php",
		   async: false,
			data: { faculty:faculty, semester:semester },
			dataType: "JSON",
			success: function(data){
			$("#subject").html("<option value=''>-- Select subject --</option>");
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
	$("#subject").html("<option value=''>-- Select subject --</option>");
				for(var i=0;i<data.length;i++)
	{
		var x="<option value="+data[i].subject+">"+data[i].subject+"</option>";

		 $("#subject").append(x);

	}

			} 

	});

	})



   	$(".note").on("click",function(){
   		//alert();
   		//i=0;
if(notesloaded==0){
	notesloaded++;

   		for(i=0;i<5;i++){

   				
   					for(var j=1;j<9;j++){
   						
   					$.ajax({
	   							method:"POST",
	            				async:false,
					            url:"getsubjects.php",
					            data: {"string":programme[i]+'-'+j},
					            dataType:"JSON",
					            success:function(data){
					            	b=0;
					            	y="";
					            	console.log(data);
   					if(j==1){

   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Notes-'+programme[i]+'-1st" aria-expanded="false" aria-controls="Notes-'+programme[i]+'-1st">1st</button>';
   							if(data[0].total>0){
   							for( a=0;a<data[0].total;a++)
   								{
   									y+='	<a href="notes.php?type=notes&faculty='+programme[i]+'&semester=First&subject='+data[a].subject+'"><button type="button" class="btn btn-default btn-lg btn-block" >'+data[a].subject+'</button></a>	  	';
   								}
					            	x+='<div class="col-md-12">	<div class="collapse" id="Notes-'+programme[i]+'-1st">'+y+'</div></div>	';	}			      
					            	     
   					}else if(j==2){
   							x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Notes-'+programme[i]+'-2nd" aria-expanded="false" aria-controls="Notes-'+programme[i]+'-2nd">2nd</button>';
   								if(data[0].total>0){
   							for( a=0;a<data[0].total;a++)
   								{
   									y+='	<a href=notes.php?type=notes"&faculty='+programme[i]+'&semester=2nd&subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	</a>  	';
   								}
					            	x+='<div class="col-md-12"><div class="collapse" id="Notes-'+programme[i]+'-2nd">	'+y+'</div></div>	';	}

   					}else if(j==3){
   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Notes-'+programme[i]+'-3rd" aria-expanded="false" aria-controls="Notes-'+programme[i]+'-3rd">3rd</button>';



   						if(data[0].total>0){
		   						for( a=0;a<data[0].total;a++)
		   								{
		   									y='	<a href=notes.php?type="notes"&faculty='+programme[i]+'&semester=3rd&subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	</a>  	';
		   								}
							            	x+='<div class="col-md-12"><div class="collapse" id="Notes-'+programme[i]+'-3rd">	'+y+'</div></div>	';	
					            }
   					}else{
   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Notes-'+programme[i]+'-'+j+'th" aria-expanded="false" aria-controls="Notes-'+programme[i]+'-'+j+'th">'+j+'th</button>';
   							if(data[0].total>0){
		   						for( a=0;a<data[0].total;a++)
		   								{
		   									y='	<a href=notes.php?type="notes"&faculty='+programme[i]+'&semester='+j+'th & subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	  	</a>';
		   								}
							            	x+='<div class="col-md-12"><div class="collapse" id="Notes-'+programme[i]+'-'+j+'th">	'+y+'</div></div>	';
					            }
   						}//end of else
   				
   					$('#Notes-'+programme[i]).append(x);
   					}

   				});
   			}
   			}

}
   	})

	$(".question").on("click",function(){
   		//alert();
   		//i=0;
   		if(questionloaded==0){
   			questionloaded++;
   		
   		for(i=0;i<5;i++){

   				
   					for(var j=1;j<9;j++){
   						
   					$.ajax({
	   							method:"POST",
	            				async:false,
					            url:"getsubjects.php",
					            data: {"string":programme[i]+'-'+j},
					            dataType:"JSON",
					            success:function(data){
					            	b=0;
					            	y="";
					            	console.log(data);
   					if(j==1){

   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Questions-'+programme[i]+'-1st" aria-expanded="false" aria-controls="Questions-'+programme[i]+'-1st">1st</button>';
   							if(data[0].total>0){
   							for( a=0;a<data[0].total;a++)
   								{
   									y+='	<a href=notes.php?type="Questions"&faculty='+programme[i]+'&semester=1st&subject='+data[b].subject+'><button type="button" class="btn btn-default btn-lg btn-block" >'+data[a].subject+'</button></a>	  	';
   								}
					            	x+='<div class="col-md-12">	<div class="collapse" id="Questions-'+programme[i]+'-1st">'+y+'</div></div>	';	}			      
					            	     
   					}else if(j==2){
   							x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Questions-'+programme[i]+'-2nd" aria-expanded="false" aria-controls="Questions-'+programme[i]+'-2nd">2nd</button>';
   								if(data[0].total>0){
   							for( a=0;a<data[0].total;a++)
   								{
   									y+='	<a href=notes.php?type="Questions"&faculty='+programme[i]+'&semester=2nd&subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	</a>  	';
   								}
					            	x+='<div class="col-md-12"><div class="collapse" id="Questions-'+programme[i]+'-2nd">	'+y+'</div></div>	';	}

   					}else if(j==3){
   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Questions-'+programme[i]+'-3rd" aria-expanded="false" aria-controls="Questions-'+programme[i]+'-3rd">3rd</button>';



   						if(data[0].total>0){
		   						for( a=0;a<data[0].total;a++)
		   								{
		   									y='	<a href=notes.php?type="Questions"&faculty='+programme[i]+'&semester=3rd&subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	</a>  	';
		   								}
							            	x+='<div class="col-md-12"><div class="collapse" id="Questions-'+programme[i]+'-3rd">	'+y+'</div></div>	';	
					            }
   					}else{
   						x='<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#Questions-'+programme[i]+'-'+j+'th" aria-expanded="false" aria-controls="Questions-'+programme[i]+'-'+j+'th">'+j+'th</button>';
   							if(data[0].total>0){
		   						for( a=0;a<data[0].total;a++)
		   								{
		   									y='	<a href=notes.php?type="Questions"&faculty='+programme[i]+'&semester='+j+'th & subject='+data[a].subject+'><button type="button" class="btn btn-default btn-lg btn-block" ></button>	  	</a>';
		   								}
							            	x+='<div class="col-md-12"><div class="collapse" id="Questions-'+programme[i]+'-'+j+'th">	'+y+'</div></div>	';
					            }
   						}//end of else
   				
   					$('#Questions-'+programme[i]).append(x);
   					}

   				});
   			}
   			}

}
   	})



      $('select[name=program]').change(function(){
         var program = $(this).val();
         $.ajax({
            url: 'getsubjects.php',
            method: 'post',
            data: {'program' : program},
            dataType: 'text',
            success: function(resp){
             $('select[name=subject]').empty().append(resp);
          }
       });
      });
   });
</script>