<?php require_once 'header.php' ?>

<div class="container">
   <div class="row">
      <div class="col-md-2">
         <div class="text-center profile-block">
            <ul class="nav navbar-default">
               <li>
                  <a href="#">News Feed</a>
               </li>
               <li>
                  <a href="#">Top Stories</a>
               </li>
               <li>
                  <a href="#">Computer</a>
               </li>
               <li>
                  <a href="#">Engineering</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-md-7">
          
          <div class="question-form">
        
            </div>
        
            <!--posting question-->
        
         <!--official block-->
















         
         
            </div>
            <div class="col-md-3">
               <div class="block-categories">
                  <label>Categories</label>
                  <ul>
                     <li>
                        <a href="#">Education</a>
                     </li>
                     <li>
                        <a href="#">Health</a>
                     </li>
                     <li>
                        <a href="#" id=st>Computer</a>
                     </li>
                     <li>
                        <a href="#" id=te>Engineering</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <?php require_once 'footer.php' ?>
     
      
      <script type="text/javascript">
         var x;
         var postednotlogged=0;
         var postedlogged=0;
         var i=0;
         var myJSON;
         var myObj;
         var answerIndex;
         var questionId;
         var answerQuantity;
         var j=0;
         var y;
         var LIMITS=100;
         var turn=0;
           var char_limit = 171; 
			
         $(document).ready(function(){











$(window).scroll(function() {
         


    
         if ($(window).scrollTop() >= ($(document).height() - $(window).height()-10)) {
             $.post("maxQuestion_id.php",function(data1){
     			data=parseInt(data1);
     
   // alert(data);
    //alert(i);
         //added extra variable to store content of answer block when dynamic question panles are created 
         if(i<data){
         	
         

                x="<!--official block--><div class='panel' >   <div class='panel-heading' ><a href='profile.php' class='asker-img pull-left open'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40'></a> <div class='panel-heading-right'>   <div style='display:none'class='question-id'></div><div style='display: inherit;word-break:break-all;white-space: wrap; ' class='questions'>ashok is very busy with his gf?</div>        <!--question marks here-->    <!--question marks here--> <!--question marks here-->                   <!--question marks here-->                   <div class='asker-info' >                       <a href='profile.php' class='testtt'>                         <!--askers profile redirects here-->        <!--askers profile redirects here-->                         <!--askers profile redirects here-->                           <!--askers profile redirects here-->   <span class='glyphicon glyphicon-user' ></span>                         <!--name of asker needs  to be querried -->        <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                       <div class='asker-name' style='display: inherit;'>Ashok Kunwar</div>                   </a> <a href='javascript:void(0)' class='btn-toggle-answer-body'><div class='tog' style='display:none'>hide</div>  <div style='display: inline;'' class='answer-quantity'>2</div> Answers<!--changes -->     <!--changes --><!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  </a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span> <!--changes -->                   <!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  <div style='display: inline;' class='question-date'>14 Dec 2018</div><!--changes --><!--changes --><!--changes -->               </span>                                         </div>                  </div>                                    <div class='write-answer-block'>                      <!--this dynamically add an answer block here when the user is logged in-->                  </div>               </div>               <div class='panel-body answer-body'>                  </div>            </div>   <!--official block ends here-->";






                 $(".col-md-7").append(x);





 						     $.post("loginstatus.php",function(data){
 			        						    if(!parseInt(data)){//while not logged in dont show the reply box
										              //if( postednotlogged!=0){
                                    //  postednotlogged=0;
										                  x="<h6>please login to reply</h6>";
										               //   postednotlogged=1;
										                  $(" .write-answer-block").html(x);
										                  $(".question-form").css({display:"none",});
                                     //   }
										               }
               
            										
            											else {
                                 //   if(postedlogged!=0){
                                    //  postedlogged=0;
                                    
                                           x="<div class='form-group'><textarea class='form-control' name='answer' rows='7' placeholder='Typer your answer...'></textarea></div><div class='image-display' style='display:inline'>   <form action='#' method='POST' enctype='multipart/form-data' ><label  for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><input type=button   name='submit' class='btn btn-primary' value=post></div></form>";
                                            $(".write-answer-block").html(x);

                                              
                                         //   x="<a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Image Preview'"; 
                                          //  x+="src='image/ashok.jpg'"; 
                                            //x+="class='img-circle' width='22' height='22'></a>  <form class='navbar-form'><div class='form-group'>  <input type='text' class='form-control' placeholder='Add comment...'></div> <button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
                                         //   $(".comment").html(x);
         //x="<a href='javascript:void(0)' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> | 123</a><a href='javascript:void(0)' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span> Downvote</a>";
            //$('.btn-votes').append(x);



                       if(postedlogged!=0){
                                      postedlogged=0;
                                        turn=1;
                                            $(".uploads").on('change', function () {

                                               alert($('.uploads').parents().find('.panel-body.answer-body').index());
                                                  var imgPath = $(this)[0].value;
                                                  var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

                                                  if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                                      if (typeof (FileReader) != "undefined") {

                                                          var image_holder = $(".image-display");
                                                          image_holder.empty();

                                                          var reader = new FileReader();
                                                          reader.onload = function (e) {
                                                             $(".image-display").append("<img class="+extn+" src='"+e.target.result+"' height='30%' width='60%' />");
                                                             //$("#question-image").text("yes");
                                                             //prepend($('<img>',{id:'theImg',src:''+e.target.result+'',}));
                                                             // $("<img />", {   "src": e.target.result, "class": "thumb-image" }).appendTo(image_holder);

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

                                    





                                    }//end of posted logged in
                                  }
         // alert(data1);
  
            
              //    }
					             
   		
							})






        
 $.ajax({
   method:"POST",
   url:"query.php",
       async: false,

   data: {'LIMITS':LIMITS},
   dataType:"JSON",
   success:function(data){
      for(var k = 0; k < data.length; k++){
         var datas=data[k];       
         $(".question-id").eq(i).text(datas.question_id);
         $(".questions").eq(i).text(datas.question_text);
         $(".question-date").eq(i).text(datas.date);
         $(".asker-name").eq(i).text(datas.username);
         $(".asker-name").eq(i).attr("id",datas.member_id);
         $(".answer-quantity").eq(i).text(datas.total_replies);
         $('.panel-body.answer-body').eq(i).attr('id',"answer"+datas.question_id);
          $(".open").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".testtt").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".panel-heading").eq(i).find("img").attr("src", "image/"+datas.profile_pic);
         i++;
         LIMITS=parseInt(datas.question_id);
         //alert(LIMITS);
      }
   }

   
})//end of ajax



 $('body').on('submit','.answer-form',function(e){
         e.preventDefault();
         var reply_text = $(this).find('textarea').val();
         var question_id = parseInt($(this).parents('.panel').find('.question-id').text());
         $(this)[0].reset();

         $.ajax({
            method:"POST",
            url:"post_answer.php",
            data: {'member_id':1,'reply_text':reply_text,'question_id':question_id},
            dataType:"text",
            success:function(data){
               $('#success-message').html(data).removeClass('hide');
               setTimeout(function(){
                  $('#success-message').hide();
               },2000);
            }   
         });

         var answer_quantity = parseInt($(this).parents('.panel').find('.answer-quantity').text());
         $(this).parents('.panel').find('.answer-quantity').empty().html(answer_quantity+1);         
         $(this).parents('.panel').find('.answer-body').empty();         
         answerIndex=$('.answer-form').index(this);
         getAnswer(answerIndex);
         $(this).parents('.panel').find('.write-answer-block').hide();
         $(this).parents('.panel').find('.answer-body').toggle();
      });


if(turn==1){

$(".btn-toggle-answer-body").on("click",function(){
answerIndex=$(".btn-toggle-answer-body").index(this);
      //  alert(answerIndex);

        // id= $(".panel-body.answer-body").eq(answerIndex).attr('id');


         // $("#"+id).slideToggle("slow");
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










}// end of turn variable
      










}//end of if
else{
	 $('.col-md-7').append("");
}

})


        
         
   }
});//end of scroll





//initially displays all the questions given in the loop

			for(j=0;j<5;j++){
         	 x="<!--official block--><div class='panel' >   <div class='panel-heading' ><a  href='profile.php' class='asker-img pull-left open' ><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40' ></a> <div class='panel-heading-right' style='max-width:100%'>   <div style='display:none' class='question-id'></div><div style='display: inherit;word-break:break-all;white-space: wrap;  '  class='questions' ></div>         <!--question marks here-->    <!--question marks here--> <!--question marks here-->                   <!--question marks here-->                   <div class='asker-info' >                       <a href='profile.php' class='testtt'>                         <!--askers profile redirects here-->        <!--askers profile redirects here-->                         <!--askers profile redirects here-->                           <!--askers profile redirects here-->   <span class='glyphicon glyphicon-user' ></span>                         <!--name of asker needs  to be querried -->        <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                       <div class='asker-name' style='display: inherit;'>Ashok Kunwar</div>                   </a> <a href='javascript:void(0)' class='btn-toggle-answer-body'><div class='tog' style='display:none'>hide</div> <div style='display: inline;'' class='answer-quantity'>2</div> Answers<!--changes -->     <!--changes --><!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  </a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span> <!--changes -->                   <!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  <div style='display: inline;' class='question-date'>14 Dec 2018</div><!--changes --><!--changes --><!--changes -->               </span>                                         </div>                  </div>                                    <div class='write-answer-block'>                      <!--this dynamically add an answer block here when the user is logged in-->                  </div>               </div>               <div class='panel-body answer-body'>                   </div>            </div>   <!--official block ends here-->";
            
            $(".col-md-7").append(x);





            $.post("loginstatus.php",function(data){
	            if(!parseInt(data)){//while not logged in dont show the reply box
										               if(postednotlogged!=1){
										                  x="<h6>please login to reply</h6>";
										                  postednotlogged=1;
										                  $(" .write-answer-block").append(x);
										                  $(".question-form").css({display:"none",});
										               }
               
            											}else {
         // alert(data1);
         if(postedlogged!=1){
            postedlogged=1;//while logged in display all comment profile and all
            
            x=	"	<a href=profile.php class='testtt'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='30' height='30' ></a>          <label>Ashok Kunwar</label>            <div class='form-group'>  <textarea  class='form-control' id='ask_question' placeholder='What is your Question?'></textarea>   </div> <div id='question-image' style='display: none'>none</div>  <div id='image-holder'></div>  <div class=row> <div class='col-xs-4'>  <select class='form-control' name='category' id='category' >  <option value=''>Select Category</option><option>Programming</option><option>Education</option> <option>Poltics</option></select> </div>   <form action='uploadinitial.php' method='POST' enctype='multipart/form-data' ><label for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><button id='postQuestion'  name='submit' class='btn btn-primary' type='submit'>Upload</button></div></form>"; 
             
            $(".question-form").css({display:"show",});
            $(".question-form").html(x);
            


             $("#fileUpload").on('change', function () {

                            var imgPath = $(this)[0].value;
                            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

                            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                if (typeof (FileReader) != "undefined") {

                                    var image_holder = $("#image-holder");
                                    image_holder.empty();

                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                       $("#image-holder").append("<img class="+extn+" src='"+e.target.result+"' height='30%' width='60%' />");
                                       $("#question-image").text("yes");
                                       //prepend($('<img>',{id:'theImg',src:''+e.target.result+'',}));
                                       // $("<img />", {   "src": e.target.result, "class": "thumb-image" }).appendTo(image_holder);

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

              $("#postQuestion").on("click",function(){
  
                   alert();
                 y=$("#ask_question").val();
                 
                            if($('#question-image').text()=='yes'){
                              imagepresent='yes';
                             // z=$('#image-holder').html();
                             // y+="<br>"+$('#image-holder').html();
                              //imageextension=$('#image-holder').find('img').eq(0).attr("class");
                            //  y+=
                            }else{
                              //imagesource='none';
                            //  imageextension='none';
                            imagepresent='no';
                             // z='';  
                            }


                 category=$("#category").val();

                 //alert(category);

                 $.ajax({
                   method:"POST",
                   url:"NewQuestion.php",
                       async: false,

                   data: {'newQuestion':y,'member_id':'1','category':category,'imagepresent':imagepresent},
                   dataType:"JSON",
                   success:function(data){
                   // alert(data[0].max);



                   }
                 


                 });

                  





                              

                            })
                  }
               }

            })//end of $.post()



            
            
            
            x="<a href='#'' class='dropdown-toggle' data-toggle='dropdown'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40'><strong class='caret'></strong></a>	<ul class='dropdown-menu'>								<li><a href='#'>Profile</a></li>	<li><a href='#'>Logout</a></li>	</ul>";
            $(".profile-dropdown").html(x);
            
            
            
            x="<div class='form-group'><textarea class='form-control' name='answer' rows='7' placeholder='Typer your answer...'></textarea></div><div class='image-upload' style='display:inline'>   <form action='upload.php' method='POST' enctype='multipart/form-data' ><label for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><input type=button   name='submit' class='btn btn-primary' value=post></div></form>";
            $(".write-answer-block").html(x);
            $("#fileUpload").on('change', function () {

                            var imgPath = $(this)[0].value;
                            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

                            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                if (typeof (FileReader) != "undefined") {

                                    var image_holder = $("#image-holder");
                                    image_holder.empty();

                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                       $("#image-holder").append("<img class="+extn+" src='"+e.target.result+"' height='30%' width='60%' />");
                                       $("#question-image").text("yes");
                                       //prepend($('<img>',{id:'theImg',src:''+e.target.result+'',}));
                                       // $("<img />", {   "src": e.target.result, "class": "thumb-image" }).appendTo(image_holder);

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
            x="<a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Image Preview'"; 
            x+="src='image/ashok.jpg'"; 
            x+="class='img-circle' width='22' height='22'></a>	<form class='navbar-form'><div class='form-group'>	<input type='text' class='form-control' placeholder='Add comment...'></div>	<button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
            $(".comment").html(x);
         //x="<a href='javascript:void(0)' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> | 123</a><a href='javascript:void(0)' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span> Downvote</a>";
         //$('.btn-votes').append(x);
      


         


           


           
 $.ajax({
   method:"POST",
   url:"query.php",
       async: false,

   data: {'LIMITS':LIMITS},
   dataType:"JSON",
   success:function(data){
      for(var k = 0; k < data.length; k++){
         var datas=data[k];       
         $(".question-id").eq(i).text(datas.question_id);
        
         if(datas.isimage!='0'){

          x=datas.question_text;
          x+='<br><img src="Uploads/'+datas.src1+'" height=60% width=100%>';
          console.log(datas.src1);
         }else{
            x=datas.question_text;
         }
         
         $(".questions").eq(i).html(x);
         $(".question-date").eq(i).text(datas.date);
         $(".asker-name").eq(i).text(datas.username);
         $(".asker-name").eq(i).attr("id",datas.member_id);
         $(".answer-quantity").eq(i).text(datas.total_replies);
         $('.panel-body.answer-body').eq(i).attr('id',"answer"+datas.question_id);
         $(".open").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".testtt").eq(i).attr("href","profile.php?id="+datas.member_id);
         
         $(".panel-heading").eq(i).find("img").eq(0).attr("src", "image/"+datas.profile_pic);
         LIMITS=parseInt(datas.question_id);
         i++;
         //alert(LIMITS);
      }
   }

   
})
            }//initial questions ends here
         	
         







if(turn==0){




               
     
     
$(".btn-toggle-answer-body").on("click",function(){
         answerIndex=$(".btn-toggle-answer-body").index(this);
   // id= $(".panel-body.answer-body").eq(answerIndex).attr('id');

   // alert(id);
   // $("#"+id).slideToggle();
         answerQuantity=$('.answer-quantity').eq(answerIndex).text();
         answerQuantity=parseInt(answerQuantity);
         questionId=$(".question-id").eq(answerIndex).text();
      





          if(answerQuantity>0 ){
         // alert($(".tog").eq(answerIndex).text());
            $('.panel-body.answer-body').eq(answerIndex).html("");

           // $('.body').eq(answerIndex).toggle();
         // for(j=0;j<answerQuantity;j++){
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
            x="<div class='media'>  <a href='profile.php?id="+datas.member_id+"' class='pull-left'><img alt='Bootstrap Media Preview' ";
            x+="src=image/"+datas.profile_pic;
            x+=" width='30' height='30' class='media-object img-circle'></a>  <div class='media-body'><h4 class='media-heading'>"
            x+=datas.username;  
            x+="&nbsp <small>";
            x+=datas.date;
            x+="</small></h4> <div class='answer'>";
            



                  y=datas.reply_text;
                                
                           if(y.length<char_limit){
                           
                                // $(".panel-body").eq(i).find(".answer:first").html(x);
                                 x+=y;
                              }
                              else {

                              x+="<div>"+y.substr(0, char_limit) +"<span id=answer"+datas.reply_id+" style='display:none;'> "+y.substr(char_limit)+"     </span><a href=javascript:void(0) class='toggle'>Read More</a></div>";
                            //  $(".panel-body").eq(i).find(".answer:first").html( );

                              }






            x+="</div>  <div class='comment'></div></div><div class='btn-votes'></div></div>";
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
                  x+="class='img-circle' width='22' height='22'></a>  <form class='navbar-form'><div class='form-group'>  <input type='text' class='form-control' placeholder='Add comment...'></div> <button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
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
  // alert("clicked");
  var reply_id=  $(this).prev().attr('id');
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

















	// $('.testtt').on("click",function(){
         
      //   alert($(this).find("div").attr('id'));
      //});
}







         	
//answer query          
         ///*
         //$(document).load("session.php");	 for header to display icon and add question on top
        
         
      
   
      
      



























      
        
      });
   </script>
</body>
</html>

           


