<?php
// Inclure le fichier
require_once "config.php";
 
// Definir les variables
$nom = $descrip = $ctechnique = $ccommercial = $statut = "";
$nom_err = $descrip_err = $ctechnique_err = $ccommercial_err = $statut_err = "";
 
// verifier la valeur id dans le post pour la mise à jour
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // recuperation du champ chaché
    $id = $_POST["id"];
    
      
    // Valider le nom
    $input_nom = trim($_POST["nom"]);
    if(empty($input_nom)){
        $nom_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_err = "Veillez entrez un nom valide.";
    } else{
        $nom = $input_nom;
    }
    
       // Valider le descriptif
       $input_descrip = trim($_POST["descrip"]);
       if(empty($input_descrip)){
           $descrip_err = "Veillez entrez un descriptif.";     
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
    if(empty($input_ccommercial)){
        $ccommercial_err = "Veillez entrez le contact technique.";     
    } else{
        $ccommercial = $input_ccommercial;
    }
    
       
    // Valider le statut
    $input_statut = trim($_POST["statut"]);
    if(empty($input_statut)){
        $statut_err = "Veillez entrez le statut.";     
    } else{
        $statut = $input_statut;
    }
    // verifier les erreurs avant modification
    if(empty($nom_err) && empty($descrip_err) && empty($ctechnique_err) && empty($ccommercial_err) && empty($statut_err)){
        // Prepare an update statement
        $sql = "UPDATE partenaires SET  nom=?, descrip=?, ctechnique=?, ccommercial=?, statut=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "sssssi", $param_nom, $param_descrip, $param_ctechnique, $param_ccommercial, $param_statut, $param_id);
            
            // Set parameters
            $param_nom = $nom;
            $param_descrip = $descrip;
            $param_ctechnique = $ctechnique;
            $param_ccommercial = $ccommercial;
            $param_statut = $statut;
            $param_id = $id;
            
            // executer
            if(mysqli_stmt_execute($stmt)){
                // enregistremnt modifié, retourne
                header("location: ../partenaires.php");
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
} else{
    // si il existe un paramettre id
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // recupere URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare la requete
        $sql = "SELECT * FROM partenaires WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* recupere l'enregistremnt */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // recupere les champs
                    $nom = $row["nom"];
                    $descrip = $row["descrip"];
                    $ctechnique = $row["ctechnique"];
                    $ccommercial = $row["ccommercial"];
                    $statut = $row["statut"];

                } else{
                    // pas de id parametter valid, retourne erreur
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // pas de id parametter valid, retourne erreur
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'enregistrement</title>
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
                    <h2 class="mt-5">Mise à jour de l'enregistrement</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <span class="invalid-feedback"><?php echo $statut_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary mt-3" value="Enregistrer">
                        <a href="../modif_partenaires.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>