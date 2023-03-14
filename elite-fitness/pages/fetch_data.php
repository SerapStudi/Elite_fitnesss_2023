<?php
session_start();
$page = 'Modifier_Structures';
include '../lib/config.php';
include './_partials/scripts.php';
include 'session.php';
include '_partials/header.php';
//include '_partials/navbar.php';
$sq = 'SELECT * FROM structure';
if(isset($_POST["storage"]  ))
	{
		print $storage_filter = implode("','", $_POST["storage"]);
		
		$sq = 'SELECT * FROM structure WHERE statut IN("'.$storage_filter.'")';
	}


class Structure extends Config {
	  // Fetch all or a single user from database
	  public function fetch($sq) {
	    $sql = $sq;
	   
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }
	}

$structure = new Structure();

if($datas = $structure->fetch($sq)){
    if(count($datas) > 0){
		
        $output = '<table class="table table-striped table-bordered text-center">';
            $output .= "<thead>";
                $output . "<tr>";
                    $output .= "<th>Id</th>";
                    $output .= "<th>Nom</th>";
                    $output .= "<th>Adresse</th>";
                    $output .= "<th>Email</th>";
                    $output .= "<thStatut</th>";
                    $output .= "<th>Action</th>";
               $output .= "</tr>";
            $output .= "</thead>";
            $output .= "<tbody>";
           foreach ($datas as $row) {
                $output .= "<tr>";
                    $output .= "<td>" . $row['id'] . "</td>";
                    $output .= "<td>" . $row['nom'] . "</td>";
                    $output .= "<td>" . $row['adresse'] . "</td>";
                    $output .= "<td>" . $row['email'] . "</td>";
                    if($row['statut']==1){$statut='Active';}else{$statut='Inactive';}
                    $output .= "<td>" . $statut . "</td>";
                   
                    $output .= "<td>";

                        $output .= '<a href="./crud_structures/read.php?id='. $row['id'] .'"><span class="btn btn-primary btn-sm rounded-pill py-0 editLink">Afficher</span></a>';
						if($rol == 1){
                        $output .= '<a href="./crud_structures/update.php?id='. $row['id'] .'"><span class="btn btn-success  btn-sm rounded-pill py-0 editLink">Editer</span></a>';
                        $output .= '<a href="./crud_structures/delete.php?id='. $row['id'] .'" ><span class="btn btn-danger btn-sm rounded-pill py-0 editLink">Supprimer</span></a>';
						}
                    $output .= "</td>";
                $output .= "</tr>";
            }
            $output .= "</tbody>";                            
        $output .= "</table>";
        // Free result set
       
    } else{
       $output .=  '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
    }
} else{
    $output .=  "Oops! Une erreur est survenue";
}
echo $output;

// Fermer connection

?>
