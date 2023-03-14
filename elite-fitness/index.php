<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
// include_once '_partials/header.php';
$page = 'Connexion';



  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['password'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettre l'email et le mot de passe dans des variables
     $email = $_POST['email'] ;
     $password = $_POST['password'] ;
     $erreur = "" ;

       //Nous allons verifier si les informations entrées sont correctes
       //Connexion a la base de données
     $nom_serveur = "db5012281103.hosting-data.io";
     $utilisateur = "dbu2619205";
     $mot_de_passe ="SiteEliteFitness2023*@";
     $nom_base_données ="dbs10331785" ;
     $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_données);
     
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
      $req = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email' ");
     $row = mysqli_fetch_assoc($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
	if (password_verify($password, $row['password'])) {
		
		   if($row['resetpwd'] == 1){
          
		header("Location:pages/partenaires.php") ;		   //Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['email'] = $email;
		   }
		   else{
			  
             header("Location:pages/email.php");
            $_SESSION['email'] = $email;  
		   }
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="assets/css/stylecon.css">
</head>
<body>
   <section>
       <h1> Elite Fitness</h1>
       <h1>Formulaire de Connexion</h1></br>
       <div id="ex1">
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="email">
           <label >Mots de Passe</label>
           <input type="password" name="password">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>

    
   </section>

</body>
</html>