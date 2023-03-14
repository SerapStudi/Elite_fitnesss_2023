<?php
session_start(); 
$page = 'Partenaires';
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
    <h1 class="card-text mt-4">Les partenaires</h1>
	<?php
		if($rol == 1){
			?>
    <a class="btn btn-primary" href="crud_partenaires/create.php" role="button">Nouveau partenaire</a>
<?php
		}
			?>

        <div class="row mt-4">
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control" placeholder="Rechercher les partenaires" aria-label="Search cards"
                    onkeyup="searchFilter()">
    
            </div>
        </div>
        

        <div class="row row-cols-1 row-cols-md-2 g-4">
		
		<?php
$partenaire = new Partenaire();
$datas = $partenaire->fetch();
foreach ($datas as $row) {
 echo "";

		?>
		
            <div class="col-6">
                <div class="card h-100">
                    <img src="crud_partenaires/uploads/<?php echo $row["image"] ?>" class="card-img-top"
                        style="width:100% ; height:15vw ; object-fit:scale-down;" alt="...">
                    <div class="card-body  d-flex flex-column">
                    <span><h5 class="mt-3 ms-3 structure"><?php echo $row["nom"] ?></h5> </span> 
					<p class="mt-3 ms-3"><?php echo $row["ctechnique"] ?></p>
						<p class="mt-3 ms-3"><?php echo $row["ccommercial"] ?></p>
                      
                      
							<div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" <?php if($row['statut'] == 1){$stat = 'Actif' ;echo 'checked  '; } else {$stat = 'Inactif' ; echo 'Inactif';} ?>><?php echo $stat  ?> 
                  </div>
				
									<div class="mb-3 mt-auto">
									  <?php
				  if($rol == 1){
			?>
                                    <a href="./crud_partenaires/update.php?id=<?php echo $row['id'] ?>" button class="btn btn-dark "><i class="fas fa-exclamation"></i> Modifier</a></button>
                  <a href="./crud_partenaires/delete.php?id=<?php echo $row['id'] ?>" button class="btn btn-danger"><i class="fas fa-times"></i> Supprimer</a></button>
                  
				    <?php
				  }
			?>
				  </div>
                </div>
</div>
            </div>
			
		<?php	
}
		?>	
			
     
    
          
      
            

          
        </div>
</div>





  


    <!-- this is javascript-->
    <script>
        var searchFilter = () => {
            const input = document.querySelector(".form-control");
            const cards = document.getElementsByClassName("col-6");
            console.log(cards[1])
            let filter = input.value
            for (let i = 0; i < cards.length; i++) {
                let title = cards[i].querySelector(".card-body");
                if (title.innerText.toLowerCase().indexOf(filter.toLowerCase()) > -1) {
                    cards[i].classList.remove("d-none")
                } else {
                    cards[i].classList.add("d-none")
                }
            }
        }

    </script>




<?php
include("_partials/footer.php");
include("_partials/scripts.php");
?>