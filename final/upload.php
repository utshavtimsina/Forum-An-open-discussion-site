<?php  
require_once 'db_connect.php';
$sql = "select * from programs";
$result = mysqli_query($conn,$sql);
$programlist = [];      
while($rows=mysqli_fetch_array($result)) 
{
   array_push($programlist, $rows);
}

$err=[];
if (isset($_POST['upload'])) {
   if (isset($_POST['program']) && !empty($_POST['program'])) {
      $program = $_POST['program'];
   }else{
      $err['program'] = 'Please Choose Program';
   }

   if (isset($_POST['subject']) && !empty($_POST['subject'])) {
      $subject = $_POST['subject'];
   }else{
      $err['subject'] = 'Please Choose Subject';
   }

   if (isset($_POST['year']) && !empty($_POST['year'])) {
      $year = $_POST['year'];
   }else{
      $err['year'] = 'Please Choose Year';
   }

   if (isset($_FILES['question_bank']) && $_FILES['question_bank']['error'] == 0) {
      $file_format = ['application/pdf'];
      if(in_array($_FILES['question_bank']['type'], $file_format)){
         $question_bank = $_FILES['question_bank']['name'];  
         move_uploaded_file($_FILES['question_bank']['tmp_name'], 'files/'.$question_bank);      
      }else{
         $err['question_bank'] = 'File format did not matched.';
      }
   }else{
      $err['question_bank'] = 'Please Upload Question Bank';
   }

   $created_by = 1;

   if(count($err)==0){
      $sql = "insert into question_banks(program ,subject ,year, name, created_by) values('$program', '$subject', '$year', '$question_bank', $created_by)";
      $result = mysqli_query($conn, $sql);
      if($result){
         $suc_msg = 'Question Bank Uploaded Successfully!!!';
      }else{
         $err_msg = 'Failed to Upload Question Bank';
      }
   }
}
?>

<?php require_once 'header.php' ?>

<div class="container">
   <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-7">
         <div class="panel panel-default">
            <div class="panel-heading"><h2>Upload Question Bank</h2></div>
            <div class="panel-body">
               <?php if (isset($suc_msg)) { ?>
                  <div class="alert alert-success"><?php echo $suc_msg; ?></div>
               <?php } ?>
               <?php if (isset($err_msg)) { ?>
                  <div class="alert alert-danger"><?php echo $err_msg; ?></div>
               <?php } ?>
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Program</label>
                     <select class="form-control" name="program">
                       <option value="">Choose Program</option>
                       <?php foreach ($programlist as $pl) { ?>
                       <option value="<?php echo $pl['id'] ?>"><?php echo $pl['name'] ?></option>
                       <?php } ?>
                    </select>
                    <?php if (isset($err['program'])) { echo $err['program']; } ?>
                 </div>
                 <div class="form-group">
                  <label>Subject</label>
                  <select class="form-control" name="subject">
                     <option value="">Choose Subject</option>
                  </select>
                  <?php if (isset($err['subject'])) { echo $err['subject']; } ?>
               </div>
               <div class="form-group">
                  <label>Year</label>
                  <select class="form-control" name="year">
                     <option value="">Choose Year</option>
                     <option value="2074">2074</option>
                     <option value="2073">2073</option>
                     <option value="2072">2072</option>
                     <option value="2071">2071</option>
                  </select>
                  <?php if (isset($err['year'])) { echo $err['year']; } ?>
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
   </div>
   <div class="col-md-3">

   </div>
</div>
</div>

<?php require_once 'footer.php' ?>
<script>
   $(document).ready(function(){
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