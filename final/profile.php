<?php require_once 'header.php' ?>

<div class="container">

	<div class="row">
		<div class="col-md-2">
			<div class="text-center profile-container">
				<form id="postProfile" method="post" action="postProfile.php" enctype="multipart/form-data">
					<img   class="profilepic img-circle" src="images/profile_icon.jpg"  width="70" height="70">
					<input type="hidden" name="u_id" value="<?php echo $_GET['id'] ?>">
					<input type="file" name="file" id="profile" title="Change Profile">
				</form>
			</div>
		</div>
		<div class="col-md-7"></div>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="text-center">
				<div class="form-group">
					<label class='profileName'></label>
					<ul class="list-unstyled activity">
						<li>Questions <span class="totalquestion badge">0</span></li>
						<li>Answers <span class="totalanswer badge">0</span></li>
					</ul>
				</div>					
			</div> 
		</div>
		<div class="col-md-7 user-questions">
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>

<div class="image-save-modal">
	<div class="save-image-box">
		<button type="button" class="btn btn-danger btn-close-sibox"><i class="glyphicon glyphicon-remove"></i></button>
		<img id="image-holder" class="profilepic img-circle" src="images/profile_icon.jpg"  width="120" height="120"><br><br>
		<button type="button" class="btn btn-primary" id="postimage">Update Profile</button>
	</div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
	var i=0;
	$(document).ready(function(){
		$(".search").on("click",function(){
			needle=$(".form-control").val();

			$.ajax({
				method: 'POST',
				url:"search.php",
				data: {"needle":needle},
				dataType: 'JSON',
				success:function(data){
					console.log(data);
					if(data[0].member_id!=0){
						window.location.href='profile.php?id='+data[0].member_id+'';
					}
				}
			})
		});

		$("input").eq(0).on("keyup",function(){
			var daTa= $("input").eq(0).val();
			$.ajax({
				url:"search.php",
				method: 'POST',
				data: {"search":daTa},
				dataType: 'JSON',
				success:function(data){          
					$("datalist").text("");

					for(var k = 0; k <data.length;k++ ){        
						y="<option  value='"+data[k].username+"'>"+data[k].username+"</option>";
						$("datalist").append(y);
					}    
				}
			})  
		});  

		$.ajax({
			method:"POST",
			url:"profilequery.php",
			async: false,

			data: {member_id:"<?php echo $_GET['id']; ?>"},
			dataType:"JSON",
			success:function(data){
				if(data['userinfo']){
					var user = data['userinfo'];
					$(".profileName").html(user.thisusername);
					$(".profilepic").attr('src',"images/"+user.thisprofile_pic);
					$(".totalquestion").html(user.totalquestions);
					$(".totalanswer").html(user.totalanswer);

					if(data['questions'].length>0){
						var x='';
						for(i=0; i<data['questions'].length; i++){
							var question = data['questions'][i];
							x+="<div class='panel'><div class='panel-heading'><a href='profile.php?id="+user.thisuser_id+"' class='asker-img pull-left'><img src='images/"+user.thisprofile_pic+"' class='img-circle' width='40' height='40'></a><div class='panel-heading-right'><h2><div style='display: inherit;' class='questions' id='"+question.question_id+"'>"+question.question_text+"</div></h2><div class='asker-info'><a href='#' class='btn-toggle-answer-body'>Answers(<div style='display: inline;' class='answer-quantity'>"+question.total_replies+"</div>)</a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span><div style='display: inline;' class='question-date'> 2018-06-01</div></span></div></div>";
							<?php if (isset($_SESSION['uid'])) { ?>
								x+="<div class='write-answer-block'><form method='post' class='answer-form' enctype='multipart/form-data'><div class='form-group'><textarea class='form-control' maxlength='1800' name='answer' rows='7' placeholder='Typer your answer...' required=''></textarea></div><input type='submit' class='btn btn-primary btn-sm' name='post_answer' value='Post Answer'><input type='file' name='file' class='input-image'></form></div>";
							<?php } ?>
							x+="</div><div class='panel-body answer-body'> </div></div>";
						}
						$('.user-questions').html(x);
					}else{
						$(".panel").html("<div class='well well-lg'>No questions yet</div>");
					}
				}				
			}
		});

		$(".toggle").click(function() {
			var reply_id=	$(this).prev().attr('id');

			var elem = $(this).text();
			if (elem == "Read More") {
				$(this).text("Read Less");
				$("#"+reply_id).slideDown().css("display:inline");
			} else {
				$(this).text("Read More");
				$("#"+reply_id).slideUp();
			}
		});

		$("#profile").on('change', function () {

			var imgPath = $(this)[0].value;
			var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

			if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
				if (typeof (FileReader) != "undefined") {

					var image_holder = $("#image-holder");
					image_holder.empty();

					var reader = new FileReader();
					reader.onload = function (e) {
						$("#image-holder").attr('src',e.target.result);
						$('.image-save-modal').show();

					}
					image_holder.show();
					reader.readAsDataURL($(this)[0].files[0]);
				} else {
					alert("This browser does not support FileReader.");
				}
			} else {
				alert("Pls select only images");
			}
		});

		$('.image-save-modal .btn-close-sibox').click(function(){
			$(this).parents('.image-save-modal').hide();
		});

		$("#postimage").on("click",function(){
			$('#postProfile').submit();

		});

		$('body').on('click','.btn-toggle-answer-body',function(){
			var panel = $(this).parents('.panel');
			var questionId = panel.find('.questions').attr('id');
			$.ajax({
				method:"POST",
				url:"answerquery.php",
				data: {'questionId':questionId},
				dataType:"text",
				success:function(answer){
					panel.find('.answer-body').html(answer);
				}   
			});
		});

		$('body').on('submit','.answer-form',function(e){
			e.preventDefault();
			var panel = $(this).parents('.panel');

			formData = new FormData(this);
			var image = $(this).find('.input-image')[0].file;
			formData.append("image", image);
			var reply_text = $(this).find('textarea').val();
			var question_id = panel.find('.questions').attr('id');
			formData.append("reply_text",reply_text);
			formData.append("question_id",question_id);  
			$(this)[0].reset();

			$.ajax({
				method:"POST",
				url:"post_answer.php",
				data: formData,
				contentType: false,       
				cache: false,             
				processData:false,
				dataType:"text",
				success:function(resp){
					$('#success-message').html(resp).removeClass('hide');
					setTimeout(function(){
						$('#success-message').hide();
					},2000);

					$.ajax({
						method:"POST",
						url:"answerquery.php",
						data: {'questionId':question_id},
						dataType:"text",
						success:function(answer){
							var answer_quantity = parseInt(panel.find('.answer-quantity').text());
							panel.find('.answer-quantity').empty().html(answer_quantity+1); 
							panel.find('.answer-body').html(answer);    
							panel.find('.write-answer-block').hide();
							panel.find('.answer-body').toggle();        
						}   
					});
				}   
			});         
		});

   //upvote downvote
   $(document).on('click','.btn-upvote,.btn-downvote',function(e){    
   	var reply_id = $(this).parents('.media').find('.answer').attr('id'); 
   	var btn_votes = $(this).parent();
   	var upvote = parseInt(btn_votes.find('.btn-upvote').val());
   	var downvote = parseInt(btn_votes.find('.btn-downvote').val());
   	var index = btn_votes.find('.btn').index(this);

   	$.ajax({
   		method:"POST",
   		url:"post_vote.php",
   		data: {'reply_id':reply_id,'upvote':upvote,'downvote':downvote,'index':index},
   		dataType:"text",
   		success:function(resp){
   			if(resp){
   				$.ajax({
   					method:"POST",
   					url:"getvotes.php",
   					data: {'reply_id':reply_id},
   					dataType:"text",
   					success:function(votes){
   						btn_votes.empty().html(votes);     
   					}   
   				});
   			}
   		}   
   	});
   });
});
</script>
</body>
</html>