 $('body').on('click','.btn-toggle-answer-body',function(e){

                                                e.preventDefault();

                                                $(this).parents('.panel').find('.write-answer-block').hide();

                                                $(this).parents('.panel').find('.answer-body').toggle();

                                });

 

                $('body').on('click','.btn-toggle-write-answer',function(e){

                                                e.preventDefault();

                                                $(this).parents('.panel').find('.answer-body').hide();

                                                $(this).parents('.panel').find('.write-answer-block').toggle();

                                });


                                 $('body').on('click','.btn-toggle-answer-body',function(e){
        //
      e.preventDefault();
      
        x=$('.btn-toggle-answer-body').index(this);

        $('.panel').eq(x).find('.write-answer-block').hide()
      $('.panel').eq(x).find('.answer-body').toggle();
      //$(this).parents('.panel').find('.answer-body').css('display','block');
    });
        $('body').on('click','.btn-toggle-write-answer',function(e){
        //alert();
      e.preventDefault();
       alert(x);
        x=$('.btn-toggle-write-answer').index(this);
        $('.panel').eq(x).find('.answer-body').hide();
      $('.panel').eq(x).find('.write-answer-block').toggle();
      //$(this).parents('.panel').find('.answer-body').css('display','block');
    });
<div class='write-answer-block'>                      <!--this dynamically add an answer block here when the user is logged in-->                  </div>               </div>               <div class='panel-body answer-body'>              </div>            </div>   <!--official block ends here-->




//if(turn==1){
 // turn++;
$(".btn-toggle-answer-body").on("click",function(){
answerIndex=$(".btn-toggle-answer-body").index(this);
      //  alert(answerIndex);

         id= $(".panel-body.answer-body").eq(answerIndex).attr('id');

                $("#"+id).slideToggle("fast");
          //$("#"+id).slideToggle("slow");
   // alert(id);
   /*if($(".tog").eq(answerIndex).text()=='hide')
    {
      $("#"+id).slideDown();
      $(".tog").eq(answerIndex).text("show");
}
  else{
    $("#"+id).slideUp();
     $(".tog").eq(answerIndex).text("hide");
  }*/
       

         answerQuantity=$('.answer-quantity').eq(answerIndex).text();
         answerQuantity=parseInt(answerQuantity);
         questionId=$(".question-id").eq(answerIndex).text();
         if(answerQuantity>0 ){
         // alert($(".tog").eq(answerIndex).text());
          $('.panel-body.answer-body').eq(answerIndex).toggle();
            $('.panel-body.answer-body').eq(answerIndex).html("");

         //	for(j=0;j<answerQuantity;j++){
         //alert(answerQuantity);
         //answers querry
         $.ajax({
            method:"POST",
            async:false,
            url:"answerquery.php",
            data: {questionId:questionId,answerQuantity:answerQuantity},
            dataType:"JSON",
            success:function(data){
         //var data = $.parseJSON(data);
         //alert(data[1].date);
         for(var k = 0; k < data.length; k++){
            var datas=data[k];
           x="<div class='media'>	<a href='profile.php?id="+datas.member_id+"' class='pull-left'><img alt='Bootstrap Media Preview' ";
            x+="src=image/"+datas.profile_pic;
            x+=" width='30' height='30' class='media-object img-circle'></a>	<div class='media-body'><h4 class='media-heading'>"
            x+=datas.username;  
            x+="&nbsp <small>";
            x+=datas.date;
            x+="</small></h4>	<div class='answer'>";

            //x+= datas.reply_text;
            y=datas.reply_text;
                                
                           if(y.length<char_limit){
                           
                                // $(".panel-body").eq(i).find(".answer:first").html(x);
                                 x+=y;
                              }
                              else {
                                  //alert(datas.reply_id);
                              x+="<div>"+y.substr(0, char_limit) +"<span id=answer"+datas.reply_id+" style='display:none;'> "+y.substr(char_limit)+"     </span><a href=javascript:void(0) class='toggle'>Read More</a></div>";
                            //  $(".panel-body").eq(i).find(".answer:first").html( );

                              }
            x+="</div>	<div class='comment'></div></div><div class='btn-votes'></div></div>";
            $('.panel-body.answer-body').eq(answerIndex).prepend(x);
            
            x="<a href='javascript:void(0)' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> |";
            x+= datas.upvote;
            x+="</a><a href='javascript:void(0)' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span>|";
            x+=datas.downvote;
            x+=" Downvote</a>";
            $('.panel-body.answer-body').eq(answerIndex).find('.btn-votes:first').html(x);
            
            
            
           // $(document).load("session.php");	
            $.post("loginstatus.php",function(data1){
               if(parseInt(data1)){
                  x="<a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Image Preview'"; 
                  x+="src='image/ashok.jpg'"; 
                  x+="class='img-circle' width='22' height='22'></a>	<form class='navbar-form'><div class='form-group'>	<input type='text' class='form-control' placeholder='Add comment...'></div>	<button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
                  $(".comment").html(x);
                  
               }
            })
         //console.log(data[i].date);
      }
      
         ///*for (var i in data){
            
            
            
         //}*/
      }
      
   })
         
         
         $(".toggle").click(function() {
   //alert("clicked");
  var reply_id=   $(this).prev().attr('id');
   //alert(reply_id);
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
         //}
     }else{
        
         $('.panel-body.answer-body').eq(answerIndex).html("no answers available");
        }
        
      
      
      
      
   })//end of on clickk 










//}// end of turn
      

 
 	<div class='form-group'>  <textarea  class='form-control' id='ask_question' placeholder='What is your Question?'></textarea>		</div> 
 	<div id='question-image' >none</div>  
 	<div id='image-holder'></div>	<div class='row'>	
 		<div class='col-xs-4'>	<select class='form-control' name='category' id='category' >	<option value=''>Select Category</option><option>Programming</option><option>Education</option>	<option>Poltics</option></select>	</div><form action='/NewQuestion.php' >	
 		<div class='image-upload' style='display:inline'>   <label for='fileUpload' style='display:inline'>  <span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline';position:relative;></span>   </label>   <input id='fileUpload' style='display:none;' type='file'/></div>
 		<div class='col-xs-8 text-right' style='float:right'> <button type='submit' class='btn btn-default'>Submit</button></div>	<div></form>












 			<a href=profile.php class='testtt'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='30' height='30' ></a>					<label>Ashok Kunwar</label>            <div class='form-group'>  <textarea  class='form-control' id='ask_question' placeholder='What is your Question?'></textarea>		</div> <div id='question-image' style='display: none'>none</div>  <div id='image-holder'></div>		<div class='col-xs-4'>	<select class='form-control' name='category' id='category' >	<option value=''>Select Category</option><option>Programming</option><option>Education</option>	<option>Poltics</option></select>	</div>	<form action='/NewQuestion.php' >  <div class='image-upload' style='display:inline'>   <label for='fileUpload' style='display:inline'>  <span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline';position:relative;></span>   </label>   <input id='fileUpload' style='display:none;' type='file'/><div class='col-xs-8 text-right' style='float:right'> <button type='submit' class='btn btn-default'>Submit</button></div></div>	</form>














 			<div class='form-group'><textarea class='form-control' name='answer' rows='7' placeholder='Typer your answer...'></textarea></div><div class='image-upload' style='display:inline'>   <form action='upload.php' method='POST' enctype='multipart/form-data' ><label for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><button id='postQuestion'  name='submit' class='btn btn-primary' type='submit'>Post Answer</button></div></form>


 			<form action='upload.php' method='POST' enctype='multipart/form-data' ><label for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><button id='postQuestion'  name='submit' class='btn btn-primary' type='submit'>Upload</button></div></form>