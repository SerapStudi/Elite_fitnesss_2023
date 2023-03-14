<?php
session_start();
$page = 'Modifier_Partenaires';
include '../lib/config.php';
include '_partials/header.php';
include '_partials/navbar.php';
include './_partials/scripts.php';

	class User extends Config {
	  // Fetch all or a single user from database
	  public function fetch() {
	    $sql = 'SELECT * FROM tbl_users';
	   
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }
	}
?>


  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Liste des utilisateurs</h4>
        </div>
<?php		
		if($rol == 1){
			?>
         <div>
        <a href="./crud_utilisateurs/create.php"> 
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Ajouter un utilisateur</button>
        </a>
        </div>
		<?php
		}
		?>
      </div>
    </div>
    <div class="row mt-4">
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control"  id="myInput" placeholder="Rechercher les utilisateurs" aria-label="Search cards"
                onkeyup="myFunction()">
    
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

$user = new User();
//$datas = $user->fetch();

if($datas = $user->fetch()){
    if(count($datas) > 0){
        echo '<table class="table table-striped table-bordered text-center" id="myTable">';
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Prenom</th>";
                    echo "<th>Nom</th>";
                    echo "<th>Adresse email</th>";
                    echo "<th>Mot de passe</th>";
                    echo "<th>Statut</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($datas as $row) {
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>*******</td>";
                    
					
					  if($row['isActive']==1){$statut='Active';}else{$statut='Inactive';}
                    echo "<td>" . $statut . "</td>";
                    echo "<td>";
					
                    echo '<a href="./crud_utilisateurs/read.php?id='. $row['id'] .'" class="me-3" ><span class="align-middle" data-feather="eye"></span></a>';
					if($rol == 1){
                    echo '<a href="./crud_utilisateurs/update.php?id='. $row['id'] .'" class="me-3" ><span class="align-middle" data-feather="edit"></span></a>';
                    echo '<a href="./crud_utilisateurs/delete.php?id='. $row['id'] .'" ><span class="align-middle" data-feather="trash-2"></span></a>';
					}
                echo "</td>";
            echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Free result set
       
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



    <!-- this is javascript-->
    <script>
function myFunction() {
  // Declare variables
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>


<?php
include './_partials/footer.php';
//include './_partials/scripts.php';
?>