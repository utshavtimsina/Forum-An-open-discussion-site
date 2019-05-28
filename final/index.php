<?php require_once 'header.php' ?>
<?php require_once 'getcategory.php' ?>
<?php require_once 'getnotice.php' ?>

<div class="container">
 <div class="row">
   <div class="col-md-2">
     <div class="profile-block">
      <label>Prefrences</label>
       <ul>
        <li>
          <a href="#" class="category">Education</a>
        </li>
        <li>
          <a href="#" class="category">Science</a>
        </li>
        <li>
          <a href="#" class="category">Politics</a>
        </li>
        <li>
          <a href="#" class="category">Technology</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-md-7 main-block">
    <?php if (isset($_SESSION['uid'])) { ?>
      <form class="question-form" method="post">   
        <a href="profile.php?id=<?php echo $_SESSION['uid'] ?>"><img src="images/<?php echo $_SESSION['profile_pic'] ?>" class="img-circle" width="30" height="30"></a>
        <label><?php echo $_SESSION['username'] ?></label>
        <div class="form-group">
          <textarea class="form-control" id="ask_question" placeholder="What is your Question?"  maxlength="200" required></textarea>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <select class="form-control" id="category" required>
              <option value="">Select Category</option>
              <?php foreach ($categorylist as $category) { ?>
               <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
             <?php } ?>
           </select>
         </div>
         <div class="col-xs-8 text-right">
           <button type="submit" class="btn btn-primary"> Submit </button>
         </div>
       </div>
     </form>
   <?php } ?>
 </div>
 <div class="col-md-3">
  <div class="block-categories"> 
   <!--  <label>Categories</label>
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
   </ul> -->
   
<?php if(count($imagelist)>0) {?>
<div id="notice-slider" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php
    $i=0;
    foreach ($imagelist as $image) { 
      if($i==0){
        $itemClass=' active';
      }else{
        $itemClass='';
      } $i++;?>
      <div class="item<?php echo $itemClass ?>">
      <img src="uploads/notice/<?php echo $image['image'] ?>">
    </div>
   <?php } ?>    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#notice-slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#notice-slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php } ?>

<?php if (isset($_SESSION['uid']) && ($_SESSION['uid']==21 || $_SESSION['uid']==23 || $_SESSION['uid']==24)) { ?>
<div class="panel panel-default">
<form method="post" class="panel-body" action="upload_notice.php" enctype="multipart/form-data">
    <label>Notice</label>
    <div class="input-group">
      <input type="file" name="file" class="input-image form-control">
      <span class="input-group-btn">
        <button class="btn btn-warning" type="submit">Upload Notice</button>
      </span>
    </div>  
</form>  
</div>
<?php } ?>

 </div>
</div>
</div>
</div>

<div class="image-save-modal notice-box">
  <div class="top-tool">
      <a href="javascript:void(0)" class="btn btn-success btn-sm" download><span class="glyphicon glyphicon-download-alt"></span> Download</a> 
      <button type="button" class="btn btn-danger btn-close" download><i class="glyphicon glyphicon-remove"></i></button>
    </div>
  <img id="image-holder" class="img-responsive save-image-box" src="">
  </div>

<?php require_once 'footer.php' ?>
<script type="text/javascript">
 $(function(){

  $('#notice-slider img').click(function(){
    $('.notice-box a').attr('href',$(this).attr('src'));
    $('.notice-box img').attr('src',$(this).attr('src'));
    $('.notice-box').show();
  });

  $('.image-save-modal .top-tool .btn-close').click(function(){
    $(this).parents('.image-save-modal').hide();
  });

$(".search").on("click",function(){
      //alert($(".form-control").val());
      needle=$(".form-control").val();
    
      $.ajax({
        method: 'POST',
        url:"search.php",
        data: {"needle":needle},
        dataType: 'JSON',
        success:function(data){
          if(data[0].member_id!=0){
           window.location.href='profile.php?id='+data[0].member_id+'';
          }
        }
     })
  })
    $("input").eq(0).on("keyup",function(){

      var daTa= $("input").eq(0).val();
     // alert(daTa);
  
     // var val;
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
        //$("option").eq(k).val(data[k].resturant+","+ data[k].address);
        

        }
        
        

        }

      });
});  

   $('body').on('click','.category',function(){
    var x=$(this).text();
    var y=' <?php if (isset($_SESSION['uid'])) { ?>
          <form class="question-form" method="post">      <a href="profile.php?id=<?php echo $_SESSION['uid'] ?>"><img src="images/<?php echo $_SESSION['profile_pic'] ?>" class="img-circle" width="30" height="30"></a>   <label><?php echo $_SESSION['username'] ?></label>   <div class="form-group">      <textarea class="form-control" id="ask_question" placeholder="What is your Question?"  maxlength="200" required></textarea>   </div>   <div class="row">      <div class="col-xs-4">        <select class="form-control" id="category" required>          <option value="">Select Category</option>          <?php foreach ($categorylist as $category) { ?>
             <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>          <?php } ?>
           </select>    </div>    <div class="col-xs-8 text-right">     <button type="submit" class="btn btn-primary"> Submit </button>  </div></div></form><?php } ?>';
    $(".main-block").html(y);
      

      $.ajax({
         method:"POST",
         url:"query.php",
         data: {LIMIT:limit,"key":x,},
         dataType:"text",
         success:function(panel){
            $('.main-block').append(panel);
         }   
      });

   });

  var limit=8;

  $.ajax({
   method:"POST",
   url:"query.php",
   data: {LIMIT:limit},
   dataType:"text",
   success:function(panel){
    $('.main-block').append(panel);
  }   
});

  var scrollFunction = function(){
   var mostOfTheWayDown = ($(document).height() - $(window).height()) * 2 / 3;
   if ($(window).scrollTop() >= mostOfTheWayDown) {
     $(window).unbind("scroll");
     $.ajax({
      method:"POST",
      url:"query.php",
      data: {LIMIT:1,OFFSET:limit++},
      dataType:"text",
      success:function(panel){
       $('.main-block').append(panel);
       $(window).scroll(scrollFunction);
     }   
   }); 
   }
 };
 $(window).scroll(scrollFunction);

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

 $('.question-form').submit(function(e){
  e.preventDefault();
  var question_text = $('#ask_question').val();
  var question_category = $('#category').val();
  $(this)[0].reset();

  $.ajax({
   method:"POST",
   url:"post_question.php",
   data: {'question_text':question_text,'question_category':question_category},
   dataType:"text",
   success:function(resp){
    $.ajax({
     method:"POST",
     url:"query.php",
     data: {LIMIT:1},
     dataType:"text",
     success:function(panel){
      $(".question-form").after(panel);
    }   
  });

    $('#success-message').html(resp).removeClass('hide');
    setTimeout(function(){
     $('#success-message').hide();
   },2000);
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