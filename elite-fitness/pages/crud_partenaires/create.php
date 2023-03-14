<?php
// Inclure le fichier config
require_once "config.php";
 
// Definir les variables
$nom = $descrip = $ctechnique = $ccommercial = $statut = "";
$nom_err = $descrip_err = $ctechnique_err = $ccommercial_err = $statut_err = "";
 
// Traitement
if($_SERVER["REQUEST_METHOD"] == "POST"){



    // Valider le nom
    $input_nom = trim($_POST["nom"]);
    if(empty($input_nom)){
        $nom_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_err = "Veillez entrez un nom valide.";
    } else{
        $nom = $input_nom;
    }
    

    // Valider la description
    $input_descrip = trim($_POST["descrip"]);
    if(empty($input_descrip)){
        $descrip_err = "Veillez entrez une description.";     
    } else{
        $descrip = $input_descrip;
    }
    
    // Valider le contact technique
    $input_ctechnique = trim($_POST["ctechnique"]);
    if(empty($input_ctechnique)){
        $ctechnique_err = "Veillez entrez le contact technique.";     
    } else{
        $ctechnique = $input_ctechnique;
    }
    
      // Valider le contact commercial
      $input_ccommercial = trim($_POST["ccommercial"]);
      if(empty($input_ccommercial )){
          $ccommercial_err = "Veillez entrez le contact commercial.";     
      } else{
          $ccommercial  = $input_ccommercial ;
      }


       // Valider le statut
       $input_statut = trim($_POST["statut"]);
       if(empty($input_statut)){
           $statut_err = "Veillez entrez le statut.";     
       } else{
           $statut = $input_statut;
       }
	   
	   

       // Valider le statut
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
    if(empty($nom_err) && empty($descrip_err) && empty($ctechnique_err) && empty($ccommercial_err) && empty($statut_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO partenaires (nom, descrip, ctechnique, ccommercial, statut,image) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables à la requette preparée
            mysqli_stmt_bind_param($stmt, "ssssds", $param_nom, $param_descrip, $param_ctechnique, $param_ccommercial, $param_statut, $param_image);
            
            // Set parameters
            $param_nom = $nom;
            $param_descrip = $descrip;
            $param_ctechnique = $ctechnique;
            $param_ccommercial = $ccommercial;
            $param_statut = $statut;
			$param_image = $fname;

            // executer la requette
            if(mysqli_stmt_execute($stmt)){
               $move =  move_uploaded_file($temp,"uploads/".$fname);
                header("location: ../modif_partenaires.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
         
        // Close statement
       // mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer Partenaire</title>
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
                            <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $nom_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Descriptif</label>
                            <textarea name="descrip" class="form-control <?php echo (!empty($descrip_err)) ? 'is-invalid' : ''; ?>"><?php echo $descrip; ?></textarea>
                            <span class="invalid-feedback"><?php echo $descrip_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact Technique</label>
                            <input type="text" name="ctechnique" class="form-control <?php echo (!empty($ctechnique_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ctechnique; ?>">
                            <span class="invalid-feedback"><?php echo $ctechnique_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact Commercial</label>
                            <input type="text" name="ccommercial" class="form-control <?php echo (!empty($ccommercial_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ccommercial; ?>">
                            <span class="invalid-feedback"><?php echo $ccommercial_err;?></span>
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
                        <a href="../modif_partenaires.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>