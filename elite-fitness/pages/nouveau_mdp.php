<?php
session_start(); 
$page = 'nouveau mdp';
include '../lib/config.php';
include '_partials/con_header.php';
$servername = "db5012281103.hosting-data.io";
$username = "dbu2619205";
$password = "SiteEliteFitness2023*@";
$database = "dbs10331785";
//Create connection
$connection = new mysqli($servername, $username, $password, $database);
//Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>


 
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])) {
 
   $old_password = $_POST['old_password'];
   $new_password = $_POST['new_password'];
   $re_pass = $_POST['re_pass'];
   if($new_password != $re_pass){
	  print '<div class="card-header pb-0 text-left bg-transparent">
                  <h5 class="font-weight-bolder text-danger text-gradient">Les mots de passe ne correspondent pas </h5>
           
                </div>'; 
				}else{
				
$sql = "SELECT * FROM tbl_users WHERE email = '".$_SESSION['email']."'";
$result = $connection->query($sql);
if (!$result) {
    die("Invalid query: " . $connection->error);
}
$row = $result->fetch_assoc();

	if (password_verify($old_password, $row['password'])) {
		$sql = "UPDATE tbl_users SET password ='".password_hash($new_password, PASSWORD_DEFAULT)."', resetpwd = 1 WHERE email = '".$_SESSION['email']."'";        
       $result = $connection->query($sql);	
	  print" <script>
setTimeout(function(){
	window.location.href = 'http://elite-fitness.fr/pages/partenaires.php'; 
},50);// for 5 second redirection
</script>";
}else{	
	print 'Ancien mot passe incorrect ';	 	
}

				



}
 
}
 ?>

 <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-4">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Veuillez modifier votre mot de passe </h3>
           
                </div>
                <form action="" method="post">

                <div class="card-body">
                <form role="form">
                <label><b>Ancien mot de passe</b></label>
                    <div class="mb-3">
                <input type="password" class="form-control" placeholder="Ancien mot de passe" aria-label="Password" name="old_password" aria-describedby="password-addon" required>
                    </div>
                    
                  <label><b>Nouveau mot de passe</b></label>
                    <div class="mb-3">
                <input type="password" class="form-control" placeholder="Nouveau mot de passe" aria-label="Password" name="new_password" aria-describedby="password-addon" required>
                    </div>
                    
                    <label><b>Confirmez le mot de passe</b></label>
                    <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirmer le mot de passe" aria-label="RePassword" name="re_pass" aria-describedby="password-addon" required>
                </div>
                    <input type="submit" id='submit' name="changepass" class="btn bg-gradient-info w-100 mt-4 mb-0" value='Enregistrer'>
                   
             
                  </form>
                </div>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                style="background-image:url('../assets/img/curved-images/curved9.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  <?php
include("_partials/con_footer.php");
include("_partials/con_scripts.php");
?>

