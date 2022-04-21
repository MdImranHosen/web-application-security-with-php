<?php include "inc/header.php"; ?>
<?php 
if (!empty($login_key_)) {
   echo '<script>window.location.href="index.php";</script>';
 }

//flag variable for error handling
 $username = '';
 $password = '';
 $stripcslashes = '';
 $sqlreales = '';
 $trim_ = '';
 $htmlspecialchars_ = '';
 $htmlentities_ = '';
 $preg_replace_1 = '';
 $preg_replace_2 = '';
 $preg_replace_3 = '';
 $preg_match_ = '';
 $filter_v_email_ = '';

// Get request data
if (isset($_POST['submit'])) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  $stripcslashes = $_POST['stripcslashes'];
	  $sqlreales = $_POST['sqlreales'];
	  $trim_ = $_POST['trim_'];
	  $htmlspecialchars_ = $_POST['htmlspecialchars_'];
	  $htmlentities_ = $_POST['htmlentities_'];
	  $preg_replace_1 = $_POST['preg_replace_1'];
	  $preg_replace_2 = $_POST['preg_replace_2'];
	  $preg_replace_3 = $_POST['preg_replace_3'];
	  $preg_match_ = $_POST['preg_match_'];
    $filter_v_email_ = $_POST['filter_v_email_'];
    $sanitize_email_ = $_POST['sanitize_email_'];

    // stripcslashes 
    if (!empty($stripcslashes)) {
    	$username = stripcslashes($username); //Remove the backslas
      $password = stripcslashes($password); //Remove the backslas
    }

    // mysqli_real_escape_string - Remove the special characters from the
    if (!empty($sqlreales)) {
    	$username = mysqli_real_escape_string($mysqli, $username);
    	$password = mysqli_real_escape_string($mysqli, $password);
    }

    // trim - Remove characters from both sides of a string. 
    if (!empty($trim_)) {
    	$username = trim($username);
    	$password = trim($password);
    }    

     // htmlentities() - function convert all applicable characters to HTML entities 
    if (!empty($htmlentities_)) {
    	$username = htmlentities($username); //Convert all applicable characters to HTML entities 
      $password = htmlentities($password); //Convert all applicable characters to HTML entities
    }

    // htmlspecialchars() - function covnerts special characters into HTML entities 
    if (!empty($htmlspecialchars_)) {
    	$username = htmlspecialchars($username); //Covnerts special characters into HTML entities 
      $password = htmlspecialchars($password); //Covnerts special characters into HTML entities 
    }

    // preg_replace - Allow only letter and numbers 
    if (!empty($preg_replace_1)) {
      $username = preg_replace('/[^-a-zA-Z0-9]/','', $username); // Allow only letter and numbers
      $password = preg_replace('/[^-a-zA-Z0-9]/','', $password); // Allow only letter and numbers
    }

    // preg_replace - Allow only letter, numbers and underscore '_'
    if (!empty($preg_replace_2)) {
      $username = preg_replace('/[^-a-zA-Z0-9_]/','', $username); // Allow only letter, numbers and underscore '_' 
      $password = preg_replace('/[^-a-zA-Z0-9_]/','', $password); // Allow only letter, numbers and underscore '_' 
    }

    // preg_replace - Allow only number
    if (!empty($preg_replace_3)) {
      $username = preg_replace('/[^0-9]/', '', $username); // Allow only number
      $password = preg_replace('/[^0-9]/', '', $password); // Allow only number
      // OR
      $username = preg_replace('/\D/', '', $username); // Allow only number
      $password = preg_replace('/\D/', '', $password); // Allow only number
      // OR
      $username = (int)$username; // Convert number
      $password = (int)$password; // Convert number
    }

    // preg_match - Check if e-mail address is well-formed.
    if (!empty($preg_match_)) {

    	 if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $username)) {
    	 	$username = "Invalid email format";
    	 }

       if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $password)) {
        $password = "Invalid email format";
       }

    } 

    // FILTER_VALIDATE_EMAIL 
    if (!empty($filter_v_email_)) {

       if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
          $username = "Invalid email format";
        }

        if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
          $password = "Invalid email format";
        }
    }

    // FILTER_SANITIZE_EMAIL() - Remove all illegal characters from email
    if (!empty($sanitize_email_)) {
      $username = filter_var($username, FILTER_SANITIZE_EMAIL); //Remove all illegal characters from email 
      $password = filter_var($password, FILTER_SANITIZE_EMAIL); //Remove all illegal characters from email 
    }

    // SQL query for login 1' OR '1 = 1

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($mysqli, $sql);
     $numrows = mysqli_num_rows($res);
    if ($numrows == 1) {
        while($rowss = $res->fetch_assoc()){
         
         $id       = $rowss['id'];
         $name     = $rowss['name'];
         $username = $rowss['username'];
         $password = $rowss['password'];
         
         //data store to session
         $_SESSION["login_id"] = $id;
         $_SESSION["login_name"] = $name;
         $_SESSION["login_username"] = $username; 

         $dt = date("d-m-Y-h:i:sa");
         $access_token_insert = md5($id.$dt); //create token with md5 and date method useing
         $_SESSION["login_key"] = $access_token_insert;

         $sqlat = "INSERT INTO access_token (user_id,TOKEN) VALUES('$id','$access_token_insert')";

         $sqlAccessToken = mysqli_query($mysqli, $sqlat);

         $accetid = $mysqli->insert_id; // Get last insert id

         $_SESSION["token_id"] = $accetid;

          #header("Location:index.php");
         echo "<script>window.location.href='index.php';</script>";
        }
     }
 }
?>
<div class="container bg-light" style="border: 10px solid #034A9A;">
	<div class="row justify-content-center">
		<?php include "inc/manu.php"; ?>
        <div class="col-lg-12">
        	<div class="row">
        		<div class="col-lg-8">
              <div class="row">
              	  <div class="col-lg-12">
        		  	 <center><h1> Validation/Sanitization with Sign-in </h1></center>
        		  </div>
        		<div class="col-lg-12">
        		 <div class="card">         		  
        		 <div class="card-body">
              <!--  Form Start -->
								<form action="" method="post">
									<div class="row">
								  <div class="col-lg-6">
								    <label for="username" class="form-label">Username</label>
								    <input type="text" class="form-control" id="username" name="username" <?php if (!empty($username)) { echo "value='".$username."'"; } else{ echo 'placeholder="Enter your Username"'; } ?>>
								  </div>
								  <div class="col-lg-6">
								    <label for="password" class="form-label">Password</label>
								    <input type="text" class="form-control" id="password" name="password" <?php if (!empty($password)) { echo "value='".$password."'"; } else{ echo 'placeholder="Enter your Password"'; } ?>>
								  </div>
                 </div>
                 <div class="row">                 
                 <div class="col-lg-12">
                 	<br>
                 	<div class="table-responsive">
                 	 <table class="table table-bordered table-striped">
                 	 	   <thead>
                 	 	   	  <tr>
                 	 	   	  	<th width="5%">#</th>
                 	 	   	  	<th width="5%">Checked</th>
                 	 	   	  	<th width="20%">Method/Properties</th>
                 	 	   	  	<th width="60%">Description</th>
                 	 	   	  </tr>
                 	 	   </thead>
                 	 	   <tbody>
                 	 	   	  <tr>
                 	 	   	  	 <td>1</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($stripcslashes)) { ?> checked <?php } ?> class="form-check-input" id="stripcslashes" name="stripcslashes"></td>
                 	 	   	  	 <td>stripcslashes</td>
                 	 	   	  	 <td><small class="text-danger">Remove the backslash in front of "Word!"</small></td>
                 	 	   	  </tr>
                 	 	   	   <tr>
                 	 	   	  	 <td>2</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($sqlreales)) { ?> checked <?php } ?> class="form-check-input" id="sqlreales" name="sqlreales"></td>
                 	 	   	  	 <td>mysqli_real_escape_string</td>
                 	 	   	  	 <td><small class="text-danger">The mysqli_real_escape_string() function is used to escape characters in a string, making it legal to use in an SQL statement.</small></td>
                 	 	   	  </tr> 
                 	 	   	  <tr>
                 	 	   	  	 <td>3</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($trim_)) { ?> checked <?php } ?> class="form-check-input" id="trim_" name="trim_"></td>
                 	 	   	  	 <td>trim</td>
                 	 	   	  	 <td><small class="text-danger"> Remove whitespace including non-breaking spaces, newlines, and tabs from the beginning and end of the string.  </small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>4</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($htmlentities_)) { ?> checked <?php } ?> class="form-check-input" id="htmlentities_" name="htmlentities_"></td>
                 	 	   	  	 <td>htmlentities</td>
                 	 	   	  	 <td><small class="text-danger"> Convert all applicable characters to HTML entities.</small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>5</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($htmlspecialchars_)) { ?> checked <?php } ?> class="form-check-input" id="htmlspecialchars_" name="htmlspecialchars_"></td>
                 	 	   	  	 <td>htmlspecialchars</td>
                 	 	   	  	 <td><small class="text-danger"> Convert the special characters to HTML entities. </small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>6</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($preg_replace_1)) { ?> checked <?php } ?> class="form-check-input" id="preg_replace_1" name="preg_replace_1"></td>
                 	 	   	  	 <td>preg_replace</td>
                 	 	   	  	 <td><small class="text-danger">Allow only letter and numbers </small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>7</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($preg_replace_2)) { ?> checked <?php } ?> class="form-check-input" id="preg_replace_2" name="preg_replace_2"></td>
                 	 	   	  	 <td>preg_replace</td>
                 	 	   	  	 <td><small class="text-danger"> Allow only letter, numbers and underscore </small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>8</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($preg_replace_3)) { ?> checked <?php } ?> class="form-check-input" id="preg_replace_3" name="preg_replace_3"></td>
                 	 	   	  	 <td>preg_replace/int</td>
                 	 	   	  	 <td><small class="text-danger">Allow only number </small></td>
                 	 	   	  </tr>
                 	 	   	  <tr>
                 	 	   	  	 <td>9</td>
                 	 	   	  	 <td align="center"><input type="checkbox" <?php if (!empty($preg_match_)) { ?> checked <?php } ?> class="form-check-input" id="preg_match_" name="preg_match_"></td>
                 	 	   	  	 <td>preg_match</td>
                 	 	   	  	 <td><small class="text-danger"> Check if e-mail address is well-formed. </small></td>
                 	 	   	  </tr>
                          <tr>
                             <td>10</td>
                             <td align="center"><input type="checkbox" <?php if (!empty($filter_v_email_)) { ?> checked <?php } ?> class="form-check-input" id="filter_v_email_" name="filter_v_email_"></td>
                             <td>FILTER_VALIDATE_EMAIL</td>
                             <td><small class="text-danger"> Check if e-mail address is well-formed. </small></td>
                          </tr> 
                          <tr>
                             <td>10</td>
                             <td align="center"><input type="checkbox" <?php if (!empty($sanitize_email_)) { ?> checked <?php } ?> class="form-check-input" id="sanitize_email_" name="sanitize_email_"></td>
                             <td>FILTER_SANITIZE_EMAIL</td>
                             <td><small class="text-danger"> Remove all illegal characters from email. </small></td>
                          </tr>
                 	 	   </tbody>
                 	 </table>
                 	</div>
                 </div>
                 </div>
                 <div class="row">
                 	<div class="col-lg-12">
                 		<br>
                 		<button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> Submit </button>
                 	</div>
                 </div>								  
								</form>	
                <!--  Form End -->
								</div>
                </div>
               </div>
              </div>
        		</div>
        		<div class="col-lg-4">        		 
        		 <div class="row">
        		 	<div class="col-lg-12">
        		  	 <center><h2>Output</h2></center>
        		  </div>
              <div class="card">         		  
        		  <div class="card-body">
        		  <div class="col-lg-12">              
								<p>UserName: <?php echo $username; ?></p>
								<p>Password: <?php echo $password; ?></p>
        		    </div>
        		  </div>
               <div class="card-footer">
                 <div class="col-lg-12">
                   <?php 
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
                     ?>
                      <a href="javascript:void(0)" class="btn btn-primary session_off_on" data-ver_on_off="1"><i class="fa fa-toggle-off fa-lg"></i> Session Off </a>
                      <?php } else{ ?>
                      <a href="javascript:void(0)" class="btn btn-danger session_off_on" data-ver_on_off="0"><i class="fa fa-toggle-on fa-lg">  </i> Session On </a>
                      <?php } ?>
                </div>
               </div>
        		  </div>
        		 </div>
        	</div>
        </div>
		<div class="col-lg-12">
			<div class="card text-center">
				  <div class="card-footer text-muted">
				    <small style="font-style: italic;">Develop by Md.Imran Hosen</small>
				  </div>
				</div>
		</div>
	</div>	
</div>
<?php include "inc/footer.php"; ?>
<script type="text/javascript">
  $(document).ready(function(){
    // Session off on with jQuery and Ajax
       $('.session_off_on').on('click', function() {
        var ver_on_off = $(this).data('ver_on_off');
         if(confirm('Do you really want to Change Session Status ? '))
           {
              $.ajax({url:"inc/session_off_on.php?ver_on_off="+ver_on_off+"&verdata=98", success:function(session_data) {                    
                    window.location.href="";
                 }
               });
           }

      });
  });
</script>