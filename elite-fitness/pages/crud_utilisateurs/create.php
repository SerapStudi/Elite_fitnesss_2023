<?php
// Inclure le fichier config
require_once "config.php";
 
// Definir les variables
$name = $username = $email = $password = $isActive = "";
$name_err = $username_err = $email_err = $password_err = $isActive_err = "";
 
// Traitement
if($_SERVER["REQUEST_METHOD"] == "POST"){



    // Valider le prenom
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Veillez entrez un nom valide.";
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
          //$password  = $input_password ;
		  $password = password_hash($input_password, PASSWORD_DEFAULT);
      }


       // Valider le statut
       $input_isActive = trim($_POST["isActive"]);
       if(empty($input_isActive)){
           $isActive_err = "Veillez entrez le statut.";     
       } else{
           $isActive = $input_isActive;
       }
		$role = trim($_POST["role"]);
    // verifiez les erreurs avant enregistrement
    if(empty($name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($isActive_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tbl_users (name, username, email, password, isActive,roleid) VALUES (?, ?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables à la requette preparée
            mysqli_stmt_bind_param($stmt, "ssssdd", $param_name, $param_username, $param_email, $param_password, $param_isActive, $param_roleId);
            
            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;
            $param_isActive = $isActive;
			$param_roleId = $role;

            // executer la requette
            if(mysqli_stmt_execute($stmt)){
                // opération effectuée, retour
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
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer Utilisateur</title>
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
                    <p>Remplir le formulaire pour enregistrer l'utilisateur dans la base de données</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

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
                            <input name="email"  type="email"class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe </label>
                            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        
						
						<div class="form-group">
                            <label>Statut</label>
							<select name="isActive" id="isActive"  class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
							<option value="1">Active</option>
							<option value="0">Inactive</option>	
							<span class="invalid-feedback"><?php echo $statut_err;?></span>							
							</select>
                           
                          
                        </div>
						
						
						<div class="form-group">
                            <label>Role</label>
							<select name="role" id="role"  class="form-control <?php echo (!empty($statut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $statut; ?>">
							<option value="1">Admin</option>
							<option value="2">User</option>	
							<span class="invalid-feedback"><?php echo $statut_err;?></span>							
							</select>
                           
                          
                        </div>
                     
                        <input type="submit" class="btn btn-primary mt-3" value="Enregistrer">
                        <a href="../modif_utilisateurs.php" class="btn btn-secondary mt-3 ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>