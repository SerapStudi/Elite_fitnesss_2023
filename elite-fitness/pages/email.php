<?php
$page = 'email';
include '../lib/config.php';
include '_partials/con_header.php';
// include '../functions/routing.php';
?>
<?php
//header ("Refresh: 5;URL=nouveau_mdp.php");
//header('Refresh: 5; URL=http://elite-fitness.fr/pages/nouveau_mdp.php');
?>


<script>
setTimeout(function(){
	window.location.href = 'http://elite-fitness.fr/pages/nouveau_mdp.php'; 
},5000);// for 5 second redirection
</script>
<?php
$sujet = 'envoie de mail';
$message = '
<main class="main-content  mt-0">
   <section>
     <div class="page-header min-vh-75">
       <div class="container-fluid">
         <div class="row">
        <!--   <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">  -->
             <div class="card card-plain mt-6 mx-auto my-auto">
               <div class="card-header pb-0 text-left bg-transparent">
                 <h3 class="font-weight-bolder text-info text-gradient">Merci et bienvenue sur notre plateforme </h3></br>
                 <div class="card card-plain mt-1">
                 <p class="mb-2 mr-6">
Vous venez de créer un compte sur portail client. Avant de pouvoir utiliser votre </br>
compte, vous devez vérifier que cette adresse e-mail est bien la vôtre </br>veuillez verifier votre boite mail.</p></br>

<p>Service Technique</p>


               </div>
               </div>
             </div>
         </div>
       </div>
     </div>
          

<div class="container">
           <div class="col-md-6">
             <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
               <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
 </main>';

$destinataire ='elite.fitness.paris@gmail.com';
$header = "From:\"user\" <elite.service.technique@gmail.com>\n";
$header .= "Reply-To:elite.service.technique@gmail.com\n";
$header .= "Content-Type:text\html; charset=\"iso-8859-1\"";
if (mail($destinataire, $sujet, $message, $header)) {
  //echo "votre mail a été envoyé";
} else {
  echo "echec de l'envoi de mail";
}
?>

 <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container-fluid">
          <div class="row">
         <!--   <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">  -->
              <div class="card card-plain mt-6 mx-auto my-auto">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Merci et bienvenue sur notre plateforme </h3></br>
                  <div class="card card-plain mt-1">
                  <p class="mb-2 mr-6">
Vous venez de créer un compte sur portail client. Avant de pouvoir utiliser votre </br>
compte, vous devez vérifier que cette adresse e-mail est bien la vôtre </br>veuillez verifier votre boite mail.</p></br>

<p>Service Technique</p>


                </div>
                </div>
              </div>
          </div>
        </div>
      </div>
           

 <div class="container">
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
  $to = "dev.serap@gmail.com";
  $subject = "Confirmation compte";
  $message = "Veuillez confirmer votre email et modifier votre mot de passe depuis l'url : http://localhost:8080/04_soft/public/nouveau_mdp.php";
  $headers = "Content-Type: text/plain; charset=utf-8/r/n";
  $headers .= "From: elite.service.technique@gmail.com";


if(mail($to, $subject, $message, $headers));
//else echo "mail non envoyé";
?>

<?php
include '_partials/con_footer.php';
include '_partials/con_scripts.php';
?>
