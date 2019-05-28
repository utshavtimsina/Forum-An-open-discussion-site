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
         <form role="form" class="question-form">
            <!--posting question-->
         </form>
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
         	turn=1;
         

 x="<!--official block--><div class='panel' >   <div class='panel-heading' ><a href='profile.php' class='asker-img pull-left open'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40'></a> <div class='panel-heading-right'>   <h2><div style='display:none'class='question-id'></div><div style='display: inherit;' class='questions'>ashok is very busy with his gf?</div></h2>         <!--question marks here-->    <!--question marks here--> <!--question marks here-->                   <!--question marks here-->                   <div class='asker-info' >                       <a href='profile.php' class='testtt'>                         <!--askers profile redirects here-->        <!--askers profile redirects here-->                         <!--askers profile redirects here-->                           <!--askers profile redirects here-->   <span class='glyphicon glyphicon-user' ></span>                         <!--name of asker needs  to be querried -->        <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                       <div class='asker-name' style='display: inherit;'>Ashok Kunwar</div>                   </a> <a href='javascript:void(0)' class='btn-toggle-answer-body'> <div style='display: inline;'' class='answer-quantity'>2</div> Answers<!--changes -->     <!--changes --><!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  </a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span> <!--changes -->                   <!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  <div style='display: inline;' class='question-date'>14 Dec 2018</div><!--changes --><!--changes --><!--changes -->               </span>                                         </div>                  </div>                                    <div class='write-answer-block'>                      <!--this dynamically add an answer block here when the user is logged in-->                  </div>               </div>               <div class='panel-body answer-body'>                  <div class='media'>                    <a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Media Preview' src='image/sushil.jpg' width='30' height='30' class='media-object img-circle'></a>                   <div class='media-body'>                        <h4 class='media-heading'>Sushil Thapa <small>Jan 10, 2019</small></h4>                         <div class='answer'>                         From my perspective it depends on the problem you're solving. If you've already got a mental model of how to solve the problem, sometimes the limit really is your typing speed.<br><br>                          Most of the time, however, those periods of rabid keyboard bashing are followed and preceded by long periods of head scratching, particularly if it's a difficult problem. Nobody ever invented a compression or path-finding algorithm by typing really fast.<br><br>                          It's important to change people's perception that the work of programmers is motion (typing) rather than thinking. Programming by coincidence (The First Rule of Programming: It's Always Your Fault) can involve a lot of typing, but it's really just a painfully inefficient search strategy that almost universally leads to poor solutions: the real work is in                   </div>                  <div class='comment'>                        </div>                     </div>                                 <div class='btn-votes'>                   </div>                  </div>                  <div class='media'>                    <a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Media Preview' src='image/kiran.jpg' width='30' height='30' class='media-object img-circle'></a>                    <div class='media-body'>                        <h4 class='media-heading'>Kiran Khanal <small>Jan 17, 2019</small></h4>                      <div class='answer'>                         The general answer is definitely I think this is the most extreme example of the common perception.<br><br>                          Real programming is much slower than most people perceive and therefore extraordinarily expensive. Creating, for example, a 1,000,000 line codebase of useful code literally requires close to 1,000 engineers. It is not like writing a large novel, for example.<br><br>                         It also involves a lot of other activities besides typing (and typing code). Designs and test plans must be created and reviewed, testing must be conducted, and operational       activities like tuning and monitoring must be conducted as well; much of this takes the form of typing narrative descriptions of one’s intent, then presenting them to a larger team, or doing things like pouring over logs to find bugs.                      </div>                           <div class='comment'>                     </div>                     </div>                              <div class='btn-votes'>                </div>                  </div>               </div>            </div>   <!--official block ends here-->";






            $(".col-md-7").append(x);





 						$.post("loginstatus.php",function(data){
 			        						    if(!parseInt(data)){//while not logged in dont show the reply box
										               
										                  x="<a href='Login/getIN.php'>please login to reply</a>";
										               //   postednotlogged=1;
										                  $(" .write-answer-block").html(x);
										                  $(".question-form").css({display:"none",});
										               }
               
            										
            											else {
         // alert(data1);
  
            
					            x="<form><div class='form-group'><textarea class='form-control' name='answer' rows='7' placeholder='Typer your answer...'></textarea></div><button type='submit' class='btn btn-primary btn-sm'>Post Answer</button></form>";
					            $(".write-answer-block").html(x);
					            x="<a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Image Preview'"; 
					            x+="src='image/ashok.jpg'"; 
					            x+="class='img-circle' width='22' height='22'></a>	<form class='navbar-form'><div class='form-group'>	<input type='text' class='form-control' placeholder='Add comment...'></div>	<button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
					            $(".comment").html(x);
         //x="<a href='javascript:void(0)' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> | 123</a><a href='javascript:void(0)' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span> Downvote</a>";
   		      //$('.btn-votes').append(x);
    						  }
   		
							})






  // $('.testtt').on("click",function(){
         
    //     alert($(this).find("div").attr('id'));
     // });


         
//I=$(".btn-toggle-answer-body").index(this);
        
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
          $(".open").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".testtt").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".panel-heading").eq(i).find("img").attr("src", "image/"+datas.profile_pic);
         i++;
         LIMITS=parseInt(datas.question_id);
         //alert(LIMITS);
      }
   }

   
})//end of ajax





if(turn==1){

         	
$(".btn-toggle-answer-body").on("click",function(){
         answerIndex=$(".btn-toggle-answer-body").index(this);
        //alert(answerIndex);

         answerQuantity=$('.answer-quantity').eq(answerIndex).text();
         questionId=$(".question-id").eq(answerIndex).text();
         if(answerQuantity>0){
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










}// end of turn
      










}//end of if
else{
	 $('.col-md-7').append("");
}

})


        
         
   }
});//end of scroll




//initially displays all the questions given in the loop

			for(j=0;j<4;j++){
         	 x="<!--official block--><div class='panel' >   <div class='panel-heading' ><a  href='profile.php' class='asker-img pull-left open' ><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40' ></a> <div class='panel-heading-right'>   <h2><div style='display:none'class='question-id'></div><div style='display: inherit;'  class='questions'>ashok is very busy with his gf?</div></h2>         <!--question marks here-->    <!--question marks here--> <!--question marks here-->                   <!--question marks here-->                   <div class='asker-info' >                       <a href='profile.php' class='testtt'>                         <!--askers profile redirects here-->        <!--askers profile redirects here-->                         <!--askers profile redirects here-->                           <!--askers profile redirects here-->   <span class='glyphicon glyphicon-user' ></span>                         <!--name of asker needs  to be querried -->        <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                          <!--name of asker needs  to be querried -->                       <div class='asker-name' style='display: inherit;'>Ashok Kunwar</div>                   </a> <a href='javascript:void(0)' class='btn-toggle-answer-body'> <div style='display: inline;'' class='answer-quantity'>2</div> Answers<!--changes -->     <!--changes --><!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  </a> <a href='javascript:void(0)' class='btn-toggle-write-answer'><strong><span class='glyphicon glyphicon-pencil'></span> write answer</strong></a> <span class='pull-right'><span class='glyphicon glyphicon-time'></span> <!--changes -->                   <!--changes --><!--changes --><!--changes --><!--changes --><!--changes -->                  <div style='display: inline;' class='question-date'>14 Dec 2018</div><!--changes --><!--changes --><!--changes -->               </span>                                         </div>                  </div>                                    <div class='write-answer-block'>                      <!--this dynamically add an answer block here when the user is logged in-->                  </div>               </div>               <div class='panel-body answer-body'>                  <div class='media'>                    <a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Media Preview' src='image/sushil.jpg' width='30' height='30' class='media-object img-circle'></a>                   <div class='media-body'>                        <h4 class='media-heading'>Sushil Thapa <small>Jan 10, 2019</small></h4>                         <div class='answer'>                         From my perspective it depends on the problem you're solving. If you've already got a mental model of how to solve the problem, sometimes the limit really is your typing speed.<br><br>                          Most of the time, however, those periods of rabid keyboard bashing are followed and preceded by long periods of head scratching, particularly if it's a difficult problem. Nobody ever invented a compression or path-finding algorithm by typing really fast.<br><br>                          It's important to change people's perception that the work of programmers is motion (typing) rather than thinking. Programming by coincidence (The First Rule of Programming: It's Always Your Fault) can involve a lot of typing, but it's really just a painfully inefficient search strategy that almost universally leads to poor solutions: the real work is in                   </div>                  <div class='comment'>                        </div>                     </div>                                 <div class='btn-votes'>                   </div>                  </div>                  <div class='media'>                    <a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Media Preview' src='image/kiran.jpg' width='30' height='30' class='media-object img-circle'></a>                    <div class='media-body'>                        <h4 class='media-heading'>Kiran Khanal <small>Jan 17, 2019</small></h4>                      <div class='answer'>                         The general answer is definitely “no”. I remember seeing a movie once where two people needed to hack “harder” to “keep out some intruder” and they just started slamming on one keyboard with four hands instead of two. I think this is the most extreme example of the common perception.<br><br>                          Real programming is much slower than most people perceive and therefore extraordinarily expensive. Creating, for example, a 1,000,000 line codebase of useful code literally requires close to 1,000 engineers. It is not like writing a large novel, for example.<br><br>                         It also involves a lot of other activities besides typing (and typing code). Designs and test plans must be created and reviewed, testing must be conducted, and operational       activities like tuning and monitoring must be conducted as well; much of this takes the form of typing narrative descriptions of one’s intent, then presenting them to a larger team, or doing things like pouring over logs to find bugs.                      </div>                           <div class='comment'>                     </div>                     </div>                              <div class='btn-votes'>                </div>                  </div>               </div>            </div>   <!--official block ends here-->";
            
            $(".col-md-7").append(x);





            $.post("loginstatus.php",function(data){
	            if(!parseInt(data)){//while not logged in dont show the reply box
										               if(postednotlogged!=1){
										                  x="<a href='Login/getIN.php'>please login to reply</a>";
										                  postednotlogged=1;
										                  $(" .write-answer-block").append(x);
										                  $(".question-form").css({display:"none",});
										               }
               
            											}else {
         // alert(data1);
         if(postedlogged!=1){
            postedlogged=1;//while logged in display all comment profile and all
            
            x=	"	<a href=profile.php class='testtt'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='30' height='30' ></a>					<label>Ashok Kunwar</label>	<div class='form-group'><!-- <label for='ask_question'>	<span class='glyphicon glyphicon-pencil'></span> Ask Question</label> --><textarea  class='form-control' id='ask_question' placeholder='What is your Question?'></textarea>		</div>	<div class='row'>	<div class='col-xs-4'>	<select class='form-control' name='category'>	<option value=''>Select Category</option><option>Education</option>	<option>Poltics</option></select>	</div>	<div class='col-xs-8 text-right'><button type='submit' class='btn btn-primary'>	Submit	</button>	</div></div>";
            $(".question-form").css({display:"show",});
            $(".question-form").html(x);
            
            
            
            
            x="<a href='#'' class='dropdown-toggle' data-toggle='dropdown'><img alt='Bootstrap Image Preview' src='image/ashok.jpg' class='img-circle' width='40' height='40'><strong class='caret'></strong></a>	<ul class='dropdown-menu'>								<li><a href='#'>Profile</a></li>	<li><a href='#'>Logout</a></li>	</ul>";
            $(".profile-dropdown").html(x);
            
            
            
            x="<form><div class='form-group'><textarea class='form-control' name='answer' rows='7' placeholder='Typer your answer...'></textarea></div><button type='submit' class='btn btn-primary btn-sm'>Post Answer</button></form>";
            $(".write-answer-block").html(x);
            x="<a href='profile.php' class='pull-left' class='testtt'><img alt='Bootstrap Image Preview'"; 
            x+="src='image/ashok.jpg'"; 
            x+="class='img-circle' width='22' height='22'></a>	<form class='navbar-form'><div class='form-group'>	<input type='text' class='form-control' placeholder='Add comment...'></div>	<button type='submit' class='btn btn-primary btn-xs'>Submit</button></form>";
            $(".comment").html(x);
         //x="<a href='javascript:void(0)' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-thumbs-up'></span> | 123</a><a href='javascript:void(0)' class='btn btn-sm btn-link'><span class='glyphicon glyphicon-thumbs-down'></span> Downvote</a>";
         //$('.btn-votes').append(x);
      }
   }
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
         $(".open").eq(i).attr("href","profile.php?id="+datas.member_id);
         $(".testtt").eq(i).attr("href","profile.php?id="+datas.member_id);
         
         $(".panel-heading").eq(i).find("img").attr("src", "image/"+datas.profile_pic);
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
      //  alert(answerIndex);

         answerQuantity=$('.answer-quantity').eq(answerIndex).text();
         questionId=$(".question-id").eq(answerIndex).text();
         if(answerQuantity>0){
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
            



                  y=datas.reply_text;
                                
                           if(y.length<char_limit){
                           
                                // $(".panel-body").eq(i).find(".answer:first").html(x);
                                 x+=y;
                              }
                              else {

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

           


