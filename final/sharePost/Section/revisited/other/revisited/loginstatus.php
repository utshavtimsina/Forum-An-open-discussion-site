
<?php
session_start();
if(!isset($_COOKIE["user"])) {
     echo "0";
} 
else {
     echo "1"; 
     
}


?>
