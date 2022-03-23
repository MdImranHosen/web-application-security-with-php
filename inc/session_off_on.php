<?php include "header.php"; ?>
<?php 
if (!empty($login_key_)) {
   echo '<script>window.location.href="../index.php";</script>';
 }

  if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['verdata'] == 98) { 
   
     $status  = $_GET["ver_on_off"];
     $verdata  = $_GET["verdata"];

     if(!empty($verdata) && (($status == 0) || ($status == 1))) { 
      try {
        $status = validInt($status);
        $status = mysqli_real_escape_string($mysqli, $status);  

        $query = "UPDATE `session_manage` SET session_on_off = '$status' WHERE `id` = 1";
        $resd = mysqli_query($mysqli, $query);
        
       } catch (Exception $e) {
         
       } 
     }
  }
?>
<?php include "footer.php"; ?>