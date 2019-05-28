<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>
File Upload
</title>
</head>
<body>

<form action="uploadFiles.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file[]" multiple>
<button type="submit" name="submit">Upload</button>
</form>
<?php 

	   echo "<h1>You have selected to upload ".$_SESSION['faculty']."'s ".$_SESSION['semester']." semseter ".$_SESSION['subject']."'s ".$_SESSION['type']."</h1>";
?>
</body>
</html>
