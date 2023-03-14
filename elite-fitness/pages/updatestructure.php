<?php
define('DB_SERVER', 'db5012281103.hosting-data.io');
define('DB_USERNAME', 'dbu2619205');
define('DB_PASSWORD', 'SiteEliteFitness2023*@');
define('DB_NAME', 'dbs10331785');
 
/* Connexion à la base de données */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$vendre_boissons = $_POST["vendre_boissons"];
$vendre_equipements = $_POST["vendre_equipements"];
$gerer_planning = $_POST["gerer_planning"];
$envoyer_newsletter = $_POST["envoyer_newsletter"];
$modifier_paiement = $_POST["modifier_paiement"];
$gerer_factures = $_POST["gerer_factures"];
$id = $_POST["id"];
if($vendre_boissons == 'on')
{
	$vendre_boissons = 1;
}else
{
	$vendre_boissons = 0;
}

if($vendre_equipements == 'on')
{
	$vendre_equipements = 1;
}else
{
	$vendre_equipements = 0;
}

if($gerer_planning == 'on')
{
	$gerer_planning = 1;
}else
{
	$gerer_planning = 0;
}

if($envoyer_newsletter == 'on')
{
	$envoyer_newsletter = 1;
}else
{
	$envoyer_newsletter = 0;
}

if($modifier_paiement == 'on')
{
	$modifier_paiement = 1;
}else
{
	$modifier_paiement = 0;
}

if($gerer_factures == 'on')
{
	$gerer_factures = 1;
}else
{
	$gerer_factures = 0;
}
	
	
	 $sql = "UPDATE options SET  vendre_boissons=?, vendre_equipements=?, gerer_planning=?, envoyer_newsletter=?, modifier_paiement=?, gerer_factures=? WHERE structure_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "iiiiiii", $param_boissons, $param_equipements, $param_planning, $param_newsletter, $param_paiement, $param_factures , $param_id );
            
            // Set parameters
            $param_boissons = $vendre_boissons;
            $param_equipements = $vendre_equipements;
            $param_planning = $gerer_planning;
            $param_newsletter = $envoyer_newsletter;
            $param_paiement = $modifier_paiement;
            $param_factures = $gerer_factures;
			$param_id = $id;
            
            // executer
            if(mysqli_stmt_execute($stmt)){
                // enregistremnt modifié, retourne
              
          
			
              //print $gerer_factures;
                header("location: structures.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
		
		
?>


