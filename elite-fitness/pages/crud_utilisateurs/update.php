<?php
// Inclure le fichier
require_once "config.php";
 
// Definir les variables
$name = $username = $email = $password = $isActive = "";
$name_err = $username_err = $email_err = $password_err = $isActive_err = "";
 
// verifier la valeur id dans le post pour la mise à jour
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // recuperation du champ chaché
    $id = $_POST["id"];
    
   
    // Valider le prenom
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } else{
        $name = $input_name;
    }
    

    // Valider la nom
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Veillez entrez un nom.";     
    } else{
        $username = $input_username;
    }
    
    // Valider l'email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Veillez entrez un email.";     
    } else{
        $email = $input_email;
    }
    
      // Valider le contact mot de passe
      $input_password = trim($_POST["password"]);
      if(empty($input_password)){
          $password_err = "Veillez entrez le mot de passe.";     
      } else{
          $password  = $input_password ;
      }


       // Valider le statut
       $input_isActive = trim($_POST["isActive"]);
       if(empty($input_isActive)){
           $isActive_err = "Veillez entrez le statut.";     
       } else{
           $isActive = $input_isActive;
    }

     // verifiez les erreurs avant enregistrement
    if(empty($name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($isActive_err)){
        // Prepare an insert statement
        $sql = "UPDATE tbl_users SET name=?, username=?, email=?, password=?, isActive=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_username, $param_email, $param_password, $param_isActive, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;
            $param_isActive = $isActive;
            $param_id = $id;
            
            // executer
            if(mysqli_stmt_execute($stmt)){
                // enregistremnt modifié, retourne
                header("location: ../modif_utilisateurs.php");
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
        $sql = "SELECT * FROM tbl_users WHERE id = ?";

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
                    $name = $row["name"];
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $isActive = $row["isActive"];

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
                            <label>Prenom</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Adresse Email</label>
                            <textarea name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"><?php echo $email; ?></textarea>
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe </label>
                            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                      	<div class="form-group">
                            <label>Statut</label>
							<select name="isActive" id="isActive"  class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
							<option value="1">Active</option>
							<option value="2">Inactive</option>	
							<span class="invalid-feedback"><?php echo $statut_err;?></span>							
							</select>
                           
                          
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary mt-3" value="Enregistrer">
                        <a href="../modif_utilisateurs.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>