<?php
// Inclure le fichier
require_once "config.php";
 
// Definir les variables
$nom = $adresse = $email = $statut = "";
$name_err = $adresse_err = $email_err = $statut_err = "";
 
// verifier la valeur id dans le post pour la mise à jour
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // recuperation du champ chaché
    $id = $_POST["id"];
    
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
    // verifier les erreurs avant modification
    if(empty($name_err) && empty($adresse_err) && empty($email_err) && empty($statut_err)){
        // Prepare an update statement
        $sql = "UPDATE structure SET nom=?, adresse=?, email=?, statut=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "ssssi", $param_nom, $param_adresse, $param_email, $param_statut, $param_id);
            
            // Set parameters
            $param_nom = $nom;
            $param_adresse = $adresse;
            $param_email = $email;
            $param_statut = $statut;
            $param_id = $id;
            
            // executer
            if(mysqli_stmt_execute($stmt)){
                // enregistremnt modifié, retourne
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
} else{
    // si il existe un paramettre id
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // recupere URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare la requete
        $sql = "SELECT * FROM structure WHERE id = ?";

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
                    $adresse = $row["adresse"];
                    $email = $row["email"];
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
                            <span class="invalid-feedback"><?php echo $statut_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary mt-3" value="Enregistrer">
                        <a href="../modif_structures.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
