<?php
session_start(); 
$page = 'Modifier_Partenaires';
include '../lib/config.php';
include '_partials/header.php';
include '_partials/navbar.php';

class Partenaire extends Config {
	 
	  public function fetch() {
	    $sql = 'SELECT * FROM partenaires';
	   
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }
	}

?>

   
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Liste des partenaires</h4>
        </div>
		<?php
		if($rol == 1){
			?>
        <div>
        <a href="./crud_partenaires/create.php"> 
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Ajouter un partenaire</button>
        </a>
        </div>
		<?php
		}
			?>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive-sm">
        <div class="mt-5 mb-3 d-flex justify-content-between">
          <?php

$partenaire = new Partenaire();

if($datas = $partenaire->fetch()){
    if(count($datas) > 0){
        echo '<table class="table table-striped table-bordered text-center">';
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    // echo "<th>Image</th>";
                    echo "<th>Nom</th>";
                    echo "<th>Description</th>";
                    echo "<th>Contact technique</th>";
                    echo "<th>Contact commercial</th>";
                    echo "<th>Statut</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
           foreach ($datas as $row) {
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    // echo "<td>" . $row['image'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['descrip'] . "</td>";
                    echo "<td>" . $row['ctechnique'] . "</td>";
                    echo "<td>" . $row['ccommercial'] . "</td>";
					if($row['statut']==1){$statut='Active';}else{$statut='Inactive';}
                    echo "<td>" . $statut . "</td>";
                    echo "<td>";

                        echo '<a href="./crud_partenaires/read.php?id='. $row['id'] .'"><span class="btn btn-primary btn-sm rounded-pill py-0 editLink">Afficher</span></a>';
						if($rol == 1){
                        echo '<a href="./crud_partenaires/update.php?id='. $row['id'] .'"><span class="btn btn-success  btn-sm rounded-pill py-0 editLink">Editer</span></a>';
                        echo '<a href="./crud_partenaires/delete.php?id='. $row['id'] .'" ><span class="btn btn-danger btn-sm rounded-pill py-0 editLink">Supprimer</span></a>';
						}
                    echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Free result set
       // mysqli_free_result($result);
    } else{
        echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
    }
} else{
    echo "Oops! Une erreur est survenue";
}

// Fermer connection
//mysqli_close($link);
?>
</div>
</div>        
</div>
</div>


<?php
include './_partials/footer.php';
include './_partials/scripts.php';
?>