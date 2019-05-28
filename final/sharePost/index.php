
<?php require_once 'header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <!-- left sidebar starts -->
      <div class="text-center profile-block">
       <!--  <ul class="nav navbar-default">
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
        </ul> -->
        <!-- left sidebar ends -->
      </div>
    </div>
    <div class="col-md-7">     
      <div class="question-form">

        <!--posting question-->
      </div>

      <!-- question panel list will appear here -->
      <!-- question panel list will appear here -->
    </div>
    <div class="col-md-3">

      <!--right sidebar starts-->


      <div class="block-categories">
        <!-- <label>Categories</label>
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
        <div class="container">
          <blockquote class="quote-box">
            <p class="quotation-mark">
              “
            </p>
            <p class="quote-text">
              Don't believe anything that you read on the internet, it may be fake. 
            </p>
            <hr>
            <div class="blog-post-actions">
              <p class="blog-post-bottom pull-left">
                Abraham Lincoln
              </p>
              <p class="blog-post-bottom pull-right">
                <span class="badge quote-badge">896</span>  ❤
              </p>
            </div>
          </blockquote>
        </div>
      </div>
      <!--right sidebar ends-->
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>
<style type="text/css">
blockquote{
  border-left:none
}

.quote-badge{
  background-color: rgba(0, 0, 0, 0.2);   
}

.quote-box{

  overflow: hidden;
  margin-top: -50px;
  padding-top: -100px;
  border-radius: 17px;
  background-color: #4ADFCC;
  margin-top: 25px;
  color:white;
  width: 325px;
  box-shadow: 2px 2px 2px 2px #E0E0E0;

}

.quotation-mark{

  margin-top: -10px;
  font-weight: bold;
  font-size:100px;
  color:white;
  font-family: "Times New Roman", Georgia, Serif;

}

.quote-text{

  font-size: 19px;
  margin-top: -65px;
}
body{
  // background: rgb(161,114,127);
}
.jumbotron,.barss{
  padding: 1% ;
  margin:0px;
  background:white;  
  //opacity: 0.3;
  max-width: 100%;
  word-break:break-all;
  white-space: wrap;
  //text-indent: wrap;
}
.post{
  margin-top: 2%;
}

.question-form{
  width: 100%;
}
.media{
  background: white;
}

</style>
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
  var limit=3;

  $(document).ready(function(){

    $.ajax({
      method:"POST",
      url:"query.php",
      data: {LIMIT:limit},
      dataType:"JSON",
      success:function(data){         
        for(var k = 0; k < data.length; k++){
          var datas=data[k];
          if(datas.isimage!='0'){
            y=datas.post_text;
            y+='<br><img src="Uploads/'+datas.src1+'" height=60% width=100%>';
          }else{
            y=datas.post_text;
          }         
          x='<div class="post"><!--main sttarts here-->  <div class="jumbotron text-center" >            <nav class="navbar  barss">              <div class="navbar-header " >                  <div class="container-fluid pull-left">                 <div class="post_id" style="display:none">'+datas.post_id+'</div>   <div class="row" style="display: block;">  <img src="../images/'+datas.profile_pic+'" class="img-circle " width="90" height="90" >                      <span  style="font:italic bold 12px/30px Georgia, serif">       &nbsp                   <h3 class="pull-right poster_name" style="width:auto;">       '+datas.username+'     <small>      added a post.                           </small>  <br>        &nbsp<small class="pull-left"> '+datas.date+'                          </small>                       </h3>                        </span>                     </div>                </div>      </div></nav><hr><nav class="navbar barss" >              <div class="navbar-header " >                  <div class="container-fluid ">                    <div class="row "  >                      <div >                      <p class="post-here"> '+y+'           </p>                      </div>                  </div>                </div>                </div>    </nav>          <hr>   ';
          <?php if (isset($_SESSION['uid'])) { ?>
            // x+='<nav class="navbar barss"  >   <div class="navbar-header " ><div class="container-fluid ">                    <div class="row  navbar-text"  >                      <button type="button" class="btn btn-primary ">                         '+datas.likes+' |   <span class="glyphicon glyphicon-thumbs-up"></span> Like                          </button>                          <button type="button" class="btn btn-primary">       '+datas.unlikes+' |                     <span class="glyphicon glyphicon-thumbs-down"></span> Unlike                          </button>  <button type="button" class="btn btn-primary comments" data-toggle="collapse" data-target="#post'+datas.post_id+'" aria-expanded="false" aria-controls="post'+datas.post_id+'">      '+datas.total_replies+' |    <span class="glyphicon glyphicon-comment"></span> Comment        </button >        <ul class="collapse media-list" id="post'+datas.post_id+'">  </ul> <!--this is collapse -able now add comments here-->  </div>            </div>                </div>           </nav>';
          <?php } ?>
          x+='</div><!--jumbotron ends here-->      </div><!--row ends here-->';
          $(".col-md-7").append(x);             
        }
      }   
    });

    $("body").on("click",".nestedcomments",function(){
      commentIndex=$('.nestedcomments').index(this);
    });

    <?php if (isset($_SESSION['uid'])) { ?>
      x=  " <a href=profile.php class='testtt'><img src='../images/<?php echo $_SESSION['profile_pic']?>' class='img-circle' width='30' height='30' ></a>          <label><?php echo $_SESSION['username']?></label>            <div class='form-group'>  <textarea  class='form-control' id='ask_question' placeholder='What do you want to say?'></textarea>   </div> <div id='question-image' style='display:none;'>none</div>  <div id='image-holder'></div>  <form action='uploadinitial.php' method='POST' enctype='multipart/form-data' ><label for='fileUpload' style='display:inline'><span class='glyphicon glyphicon-picture' style='font-size:220%;display:inline'></span>    <input type='file' class='uploads' name='file' id='fileUpload' style='display:none;'> </label><div class='col-xs-2 pull-right'><button id='postQuestion'  name='submit' class='btn btn-primary' type='submit'>Upload</button></div></form>"; 

      $(".question-form").html(x);
      $(".question-form").css({display:"show"});

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
        y=$("#ask_question").val();
        if($('#question-image').text()=='yes'){
          imagepresent='yes';
        }else{
          imagepresent='no';
        }

        // category=$("#category").val();
        // ,'category':category

        $.ajax({
          method:"POST",
          url:"NewQuestion.php",
          async: false,
          data: {'newQuestion':y,'member_id':'1','imagepresent':imagepresent},
          dataType:"text",
          success:function(data){
          }
        });
      });
    <?php }else{ ?>
      $(".question-form").css({display:"none"});
    <?php } ?>

    j=3;
    var scrollFunction = function(){
      var mostOfTheWayDown = ($(document).height() - $(window).height()) * 2 / 3;
      if ($(window).scrollTop() >= mostOfTheWayDown) {
        $(window).unbind("scroll");
        $.ajax({
          method:"POST",
          url:"query.php",
          data: {LIMIT:1,OFFSET:j},
          dataType:"JSON",
          success:function(data){
            if(data.length){
              var datas=data[0];
              if(datas.isimage!='0'){
                y=datas.post_text;
                y+='<br><img src="Uploads/'+datas.src1+'" height=60% width=100%>';
              }else{
                y=datas.post_text;
              }
              x='<div class="row post"><!--main sttarts here-->  <div class="jumbotron text-center" >            <nav class="navbar  barss">              <div class="navbar-header " >                  <div class="container-fluid pull-left">                 <div class="post_id" style="display:none">'+datas.post_id+'</div>   <div class="row" style="display: block;">  <img src="../images/'+datas.profile_pic+'" class="img-circle " width="90" height="90" >                      <span  style="font:italic bold 12px/30px Georgia, serif">       &nbsp                   <h3 class="pull-right poster_name" style="width:auto;">       '+datas.username+'     <small>      added a post.                           </small>  <br>        &nbsp<small class="pull-left"> '+datas.date+'                          </small>                       </h3>                        </span>                     </div>                </div>      </div></nav><hr><nav class="navbar barss" >              <div class="navbar-header " >                  <div class="container-fluid ">                    <div class="row "  >                      <div >                      <p class="post-here"> '+y+'           </p>                      </div>                  </div>                </div>                </div>    </nav>          <hr>   ';
              // x+='<nav class="navbar barss"  >   <div class="navbar-header " ><div class="container-fluid ">                    <div class="row  navbar-text"  >                      <button type="button" class="btn btn-primary ">                         '+datas.likes+' |   <span class="glyphicon glyphicon-thumbs-up"></span> Like                          </button>                          <button type="button" class="btn btn-primary">       '+datas.unlikes+' |                     <span class="glyphicon glyphicon-thumbs-down"></span> Unlike                          </button>  <button type="button" class="btn btn-primary comments" data-toggle="collapse" data-target="#post'+datas.post_id+'" aria-expanded="false" aria-controls="post'+datas.post_id+'">      '+datas.total_replies+' |    <span class="glyphicon glyphicon-comment"></span> Comment        </button >        <ul class="collapse media-list" id="post'+datas.post_id+'">  </ul> <!--this is collapse -able now add comments here-->  </div>            </div>                </div>           </nav>';
              x+='        </div><!--jumbotron ends here-->      </div><!--row ends here-->';
              $(".col-md-7").append(x);
              j++;

              $(window).scroll(scrollFunction);
            }  
          } 
        }); 
      }
    };
    $(window).scroll(scrollFunction);


    $("body").on("click",".comments",function(){
      postIndex=$('.comments').index(this);
      postId=$(".post_id").eq(answerIndex).text();
      getAnswer(postIndex);
    });

    function getAnswer(answerIndex){
      answerQuantity=parseInt($('.comments').eq(answerIndex).text());
      postId=$(".post_id").eq(answerIndex).text();
      if(answerQuantity>0){

        $.ajax({
          method:"POST",
          url:"answerquery.php",
          data: {"questionId":postId,"answerQuantity":answerQuantity},
          dataType:"JSON",
          success:function(data){

            $(".media-list").eq(answerIndex).html("");
            for(var k = 0; k < data.length; k++){
              var datas=data[k];


              x=' <li  class="media"><!--commentator--> <a class="pull-left" href="#">      <img class="media-object img-circle" src="../images/'+datas.profile_pic+'" alt="profile" width=30 height=30>       </a>          <div class="media-body"  >        <div class="well " style="background:white;max-width:160%;">                              <h4 class="media-heading reviews" >'+datas.username+' </h4>                              <ul class="media-date text-uppercase reviews list-inline">                                <li>'+datas.date+'</li> </ul>                             <p class="media-comment"><span class="glyphicon glyphicon-arrow-right" style="color:lightblue;"></span>'+datas.reply_text+'                 </p>        <a class="btn btn-info btn-circle text-uppercase" data-toggle="collapse" href="#reply'+datas.reply_id+'" ><span class="glyphicon glyphicon-share-alt"></span> Reply</a>  <a class="btn btn-warning btn-circle text-uppercase nestedcomments" data-toggle="collapse" href="#comment'+datas.reply_id+'"><span class="glyphicon glyphicon-comment"></span> 0 comments</a>                          </div>          </div><!--commentator ends here-->                       <div class="collapse" id="comment'+datas.reply_id+'"><!--reply commentator--> No comments Available</div><div class="collapse" id="reply'+datas.reply_id+'" >  you cannot reply right now</div><!--reply commentator ends here-->                        ';

              $(".media-list").eq(answerIndex).append(x);

              $.post("loginstatus.php",function(data1){
                if(parseInt(data1)){
                }
              })
            }
          }
        });
      }else{
        $(".media-list").eq(answerIndex).html("no comments available");
      }
    }
  });
</script>
</body>
</html>




