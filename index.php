<?php include "inc/header.php"; ?>
<?php
// if Session Status On Start
$session_on_off = 0;
 $sqls_session = "SELECT * FROM session_manage WHERE id = 1";
 $ress_session = mysqli_query($mysqli, $sqls_session);
 $numrowss_session = mysqli_num_rows($ress_session);
 if ($numrowss_session >= 1) {
   while($row_sess = $ress_session->fetch_assoc()) {
        $session_on_off = $row_sess['session_on_off'];
   }
 }

  if ($session_on_off == 0) {
// if Session Status On working  


 if (empty($login_key_) || empty($token_id_) || empty($login_id_) || empty($login_name_) || empty($login_username_)) {
   echo '<script>window.location.href="login.php";</script>';
 } else{
 	 $login_id_ = validInt($login_id_);
 	 $token_id_ = validInt($token_id_);
   $token_id_ = mysqli_real_escape_string($mysqli, $token_id_);
   $login_id_ = mysqli_real_escape_string($mysqli, $login_id_);
   $login_key_ = mysqli_real_escape_string($mysqli, $login_key_);

 	 $cksql = "SELECT * FROM access_token WHERE id = '$token_id_' AND user_id = '$login_id_' AND TOKEN = '$login_key_'";
 	 $resck = mysqli_query($mysqli, $cksql);
   $numrowsck = mysqli_num_rows($resck);
    if ($numrowsck >= 1) { 

    } else{
    	echo '<script>window.location.href="index.php?logout";</script>';
    }
 }

}

// if Session Status On  End


$post_id = '';
$validcheck = '';
 if (isset($_GET['submit'])) {
 	$post_id = $_GET['action'];
 	$validcheck = $_GET['validcheck']; 
 }
?>
<div class="container bg-light" style="border: 10px solid #034A9A;">
<div class="row justify-content-center">
<?php include "inc/manu.php"; ?>
<div class="col-lg-12">
<div class="row">
 <div class="col-lg-8">
	<div class="row">
	<!-- Post Start -->
	<?php 
	 $sql = "SELECT * FROM posts ORDER BY id ASC";
    $res = mysqli_query($mysqli, $sql);
     $numrows = mysqli_num_rows($res);
    if ($numrows >= 1) {
      while($rows = $res->fetch_assoc()){
      	$id = $rows['id'];
      	$title = $rows['title'];
      	$description = $rows['description'];
      	$create_date = $rows['create_date'];     
      	$img = $rows['img'];     
	?>
	<div class="col-lg-4 col-sm-6">
		<div class="card mdimranhosen_s1">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $title; ?></h5>
		    <h6 class="card-subtitle mb-2 text-muted"><hr><i class="fa fa-clock"></i> <?php echo $create_date; ?></h6>
		    <img src="img/post/<?php echo $img; ?>" width="100%" height="150px;">
		    <p class="card-text"><?php echo textShorten($description, 100); ?></p>

		    <form action="" method="get" id="form-id">
		    	<input type="hidden" name="action" value="<?php echo $id; ?>">
	  	 	  <input type="checkbox" name="validcheck"
          <?php 
              // Checkbox checked or not
              if (!empty($post_id)) {
              	 $post_id_n = preg_replace('/\D/', '', $post_id);
              	 if (($post_id_n == $id) && !empty($validcheck)) {
              	 	 echo ' checked ';
              	 }
              }
          
          ?>
	  	 	  > Validation/Sanitization
	  	 	  <br><br> 
	  	 	<input type="submit" class="btn btn-primary" name="submit" value="Read More >>">
	  	 </form>
		    
		  </div>
		</div>
	</div>
<?php } } ?>
<!-- Post End -->
	</div>
  </div>
	<!-- Output Data Start -->
	<div class="col-lg-4">        		 
	 <div class="row ">
	 	<div class="col-lg-12">
	  	 <center><h2>Output ... <small class="pull-right"><a class="btn btn-danger btn-sm" href="?logout">Logout</a></small></h2> </center>
	  </div>
      <div class="card">         		  
	    <div class="card-body">
	    	<div class="col-lg-12">
         <?php
         if (!empty($post_id)) {

         	if (!empty($validcheck)) {
         		$post_id = validInt($post_id);
         		$post_id = mysqli_real_escape_string($mysqli, $post_id);
         	}
         	
         	#SELECT * FROM posts WHERE id = '6' UNION SELECT * FROM posts WHERE id = '4'
           
				 $sqld = "SELECT * FROM posts WHERE id = '$post_id'";
			    $resd = mysqli_query($mysqli, $sqld);
			     $numrowsd = mysqli_num_rows($resd);
			    if ($numrowsd >= 1) {
			      while($rowsd = $resd->fetch_assoc()) {
			      	$titled = $rowsd['title'];
			      	$descriptiond = $rowsd['description'];
			      	$create_dated = $rowsd['create_date'];     
			      	$imgd = $rowsd['img'];     
				   ?>

				    <h5 class="card-title"><?php echo $titled; ?></h5>
				    <h6 class="card-subtitle mb-2 text-muted"><hr><i class="fa fa-clock"></i> <?php echo $create_dated; ?></h6>
				    <img src="img/post/<?php echo $imgd; ?>" width="100%" height="150px;">
				    <p class="card-text"><br><?php echo $descriptiond; ?></p>

				<?php } } } ?>

	    	</div>	    	
	    </div>
	  </div>
	</div>
</div>
<!-- Output Data End -->
  </div>

  <!-- Footer Start -->
		<div class="col-lg-12">
			<div class="card text-center">
				  <div class="card-footer text-muted">
				    <small style="font-style: italic;">Develop by Md.Imran Hosen</small>
				  </div>
				</div>
		</div>
		<!--   Footer End -->
	</div>	
</div>
<?php include "inc/footer.php"; ?>
