<?php require_once 'header.php' ?>

	<div class="container">

		<div class="row">
			<div class="col-md-2">
				<div class="text-center" >
					<img   class="profilepic img-circle" alt="Bootstrap Image Preview" src="image/ashok.jpg"  width="70" height="70">
				</div>
			</div>
			<div class="col-md-7"></div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<div class="text-center">
					
					<div class="form-group">
						<label class='profileName' > Ashok rar</label>
						<p class="small">Computer Engineering Student</p>
						<ul class="list-unstyled activity">
							<li>
								<a href="#">Questions <span class="totalquestion badge">5</span></a>
							</li>
							<li>
								<a href="#">Answers <span class="totalanswer badge">1</span></a>
							</li>
							<li>
								<a href="#">Followers <span class="badge">15</span></a>
							</li>
							<li>
								<a href="#">Followings <span class="badge">55</span></a>
							</li>
						</ul>
					</div>					
				</div> 
			</div>
			<div class="col-md-7">
				<div class="panel panel-default">
					
				</div>
			</div>
			<div class="col-md-3">
				<div class="">
					<label>Categories</label>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
	<script type="text/javascript">
		var i=0;
		$(document).ready(function(){
		 

      $.ajax({
   method:"POST",
   url:"profilequery.php",
      async: false,

   data: {member_id:"<?php echo $_GET['id']; ?>"},
   dataType:"JSON",
   success:function(data){



$(".profileName").html(data[0].thisusername);
//alert(data[0].thisprofile_pic);
$(".profilepic").attr('src',"image/"+data[0].thisprofile_pic);
$(".totalquestion").html(data[0].totalquestions);
$(".totalanswer").html(data[0].totalanswer);





   	// /console.log(data);
   	for(var j=0;j<data.length;){
   	//console.log(dat)
   	x="   <div class='panel-heading'><div class='question-id'></div><h2 class='questions'>How fast do programmers really code?</h2></div>   <div class='panel-body'></div> ";

   	//alert(datas.total);

      $(".panel.panel-default").append(x);
   var datas=data[j];
         $(".questions").eq(i).text(datas.question_text);

         temp=j;
		
        			
			//	alert("initial:"+datas.total+"J"+j);
        			if(datas.total>0){
        				//alert("final"+datas.total+"J"+j);
        					var char_limit = 185;
///*
        					
        					for( k = 0; k < datas.total ; k++){
        							
        				temp2=parseInt(j)+parseInt(k)+parseInt(1);
        				

						      	x=" <div class='media'>   <a href='profile.php?id="+data[temp2].newmember_id+"' class='pull-left open'><img alt='Bootstrap Media Preview' src='image/"+data[temp2].profile_pic+"' width='50' height='50' class='media-object img-circle'></a>                    <div class='media-body'>   <h4 class='media-heading '><div class='asker-name'></div><small class='question-date'>"+data[temp2].date+"</small></h4> <div class='answer'>   <div></div>  </div>      </div>  <div class='btn-votes'>  <a href='' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> | "+data[temp2].upvote+"</a> <a href='' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span>"+data[temp2].downvote+" Downvote</a> </div>  </div> ";
						      	 $(".panel-body").eq(i).prepend(x);
						       x=data[temp2].reply_text;
						              
						      	if(x.length<char_limit){
						      	
						      			$(".panel-body").eq(i).find(".answer:first").html(x);
						       		}
						       		else {

						       		
						       		$(".panel-body").eq(i).find(".answer:first").html( '<div>'+x.substr(0, char_limit) +'<span id='+data[temp2].reply_id+' style="display:none;"> '+x.substr(char_limit)+'     </span><a href=javascript:void(0) class="toggle">Read More</a></div>');

						       		}

        						 }
       				 }
       				 else {
       				 	$(".panel-body").eq(i).html("<h6> no Answers available</h6>");

       				 }
       
						         // */
						         i++;
   	
   
          
        

         //alert("j"+j);
      

         j=parseInt(temp)+parseInt(datas.total)+parseInt(1);
      }//end of for loop
   }
   
})

 $(".toggle").click(function() {
  var reply_id=	$(this).prev().attr('id');

    var elem = $(this).text();
    if (elem == "Read More") {
      //Stuff to do when btn is in the read more state
      $(this).text("Read Less");
      $("#"+reply_id).slideDown().css("display:inline");
    } else {
      //Stuff to do when btn is in the read less state
      $(this).text("Read More");
      $("#"+reply_id).slideUp();
    }
  });

});
	</script>
</body>
</html>