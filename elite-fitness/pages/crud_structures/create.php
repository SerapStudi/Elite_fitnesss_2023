<?php
// Inclure le fichier config
require_once "config.php";
 
// Definir les variables
$nom = $adresse = $email = $statut = "";
$name_err = $adresse_err = $email_err = $statut_err = "";
 
// Traitement
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Valider le nom
    $input_name = trim($_POST["nom"]);
    if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Veillez entrez un nom valide.";
    } else{
        $nom = $input_name;
    }
    
    // Valider l'adresse
    $input_adresse = trim($_POST["adresse"]);
    if(empty($input_adresse)){
        $adresse_err = "Veillez entrez une adresse.";     
    } else{
        $adresse = $input_adresse;
    }
    
    // Valider l'email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Veillez entrez l'email.";     
    } else{
        $email = $input_email;
    }
    
       // Valider le statut
       $input_statut = trim($_POST["statut"]);
       if(empty($input_statut)){
           $statut_err = "Veillez entrez le statut.";     
       } else{
           $statut = $input_statut;
       }
	   
	    $input_image = $_FILES['image']['name'];
       if(empty($input_image)){
           $image_err = "Veillez choisir une image.";     
       } else{
        $fname=$_FILES['image']['name'];
		$size=$_FILES['image']['size'];
		$type=$_FILES['image']['type'];
		$temp=$_FILES['image']['tmp_name'];
       }

    // verifiez les erreurs avant enregistrement
    if(empty($name_err) && empty($adresse_err) && empty($email_err) && empty($statut_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO structure (nom, adresse, email, statut, image) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables à la requette preparée
            mysqli_stmt_bind_param($stmt, "sssds", $param_nom, $param_adresse, $param_email, $param_statut, $param_image);
            
            // Set parameters
            $param_nom = $nom;
            $param_adresse = $adresse;
            $param_email = $email;
            $param_statut = $statut;
			$param_image = $fname;

            // executer la requette
            if(mysqli_stmt_execute($stmt)){
				 $move =  move_uploaded_file($temp,"uploads/".$fname);
                // opération effectuée, retour
                header("location: ../modif_structures.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Créer un enregistrement</h2>
                    <p>Remplir le formulaire pour enregistrer la structure dans la base de données</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <textarea name="adresse" class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>"><?php echo $adresse; ?></textarea>
                            <span class="invalid-feedback"><?php echo $adresse_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                           <div class="form-group">
                            <label>Statut</label>
							<select name="statut" id="statut"  class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
							<option value="1">Active</option>
							<option value="0">Inactive</option>	
							<span class="invalid-feedback"><?php echo $statut_err;?></span>							
							</select>
                           
                          
                        </div>
						<div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="Enregistrer">
                        <a href="../modif_structures.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>