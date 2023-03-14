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

$datas = $structure->fetch($sq);

//read data off each row
   foreach ($datas as $row) {

$output =  '<table class="tableau" id="tableau">';
print    '<div class="container-fluid mt-4">';
print    ' <div class="card w-100">';
print    ' <div class="row no-gutters">';
print    '  <div class="col-md-5"> ';
print    ' <img class="card-img-top mt-4 ms-4" src="crud_partenaires/uploads/'.$row["image"].' ?>" alt="Card image cap" style="width: 90%; height:auto;">';
 print    '     <span><h5 class="mt-4 ms-4 structure">'.$row["nom"] .'</h5> </span> ';
 print    ' <p class="mt-4 ms-4">'.$row["adresse"].'</p>';
print    '  <p class="mt-4 ms-4">'.$row["email"] .'</p>';

		
									  
	 if($rol == 1){  
	print    ' <div class="mb-3 mt-auto">';
  print    ' <a href="./crud_structures/update.php?id='.$row["id"] .' >" button class="btn btn-dark ms-3"><i class="fas fa-exclamation"></i> Modifier</a></button>';
 print    '  <a href="./crud_structures/delete.php?id='.$row["id"] .' >" button class="btn btn-danger ms-3"><i class="fas fa-times"></i> Supprimer</a></button>';
   print    ' </div>';
				    
				  }
			
				  



print    '  <div class="form-check form-switch ps-0 mt-3 ms-3 mb-3">';
  print    ' <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" ';
  if($row['statut']==1){
	  print    'checked';
	  
    print    ' >Actif';
	}
	else
	{
	print    '';
	  
    print    ' >Inactive';	
	}
             print    '     </div>';
print    ' </div>';

print    '  <div class="col-md-6">';
print    '   <div class="card-body">';

$servername = "db5012281103.hosting-data.io";
$username = "dbu2619205";
$password = "SiteEliteFitness2023*@";
$database = "dbs10331785";
//Create connection
$connection = new mysqli($servername, $username, $password, $database);
//Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
$sq = "SELECT * FROM options WHERE structure_id = ".$row['id'];
$resul = $connection->query($sq);
if (!$resul) {
    die("Invalid query: " . $connection->error);
}
$ro = $resul->fetch_assoc();
print    '    <h5 class="card-title mt-4 ms-5">Options</h5>';

print ' <form action="updatestructure.php"  id="myForm" method="POST" enctype="multipart/form-data">';

print    '    <ul class="list-group">';
print    '            <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="vendre_boissons" id="flexSwitchCheckDefault"';
 if($ro["vendre_boissons"] == 1)
 {
 print    ' checked';
 }
 print    '>'; 

print    '     <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Vendre des boissons</label>';
print    '       </div>';
print    '     </li>';
print    '      <li class="list-group-item border-0 px-0">';
print    '       <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="vendre_equipements" id="flexSwitchCheckDefault"';
 if($ro["vendre_equipements"] == 1)
 {
 print    ' checked';
 }
 print    '>';
print    '         <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Vendre des équipements</label>';
print    '        </div>';
print    '      </li>';
print    '     <li class="list-group-item border-0 px-0">';
print    '       <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="gerer_planning" id="flexSwitchCheckDefault"';
 if($ro["gerer_planning"] == 1)
 {
 print    ' checked';
 }
 print    '>';
print    '         <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Gérer le planning déquipe</label>';
print    '       </div>';
print    '      </li>';
print    '      <ul class="list-group">';
print    '    <li class="list-group-item border-0 px-0">';
print    '       <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="envoyer_newsletter" id="flexSwitchCheckDefault"';
 if($ro["envoyer_newsletter"] == 1)
 {
 print    ' checked';
 }
 print    '>';
print    '          <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Envoyer newsletter</label>';
print    '          </div>';
print    '       </li>';
print    '        <li class="list-group-item border-0 px-0">';
print    '         <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="modifier_paiement" id="flexSwitchCheckDefault"';
 if($ro["modifier_paiement"] == 1)
 {
 print    ' checked';
 }
 print    '>';
print    '           <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Modifier les paiements</label>';
print    '        </div>';
print    '      </li>';
print    '     <li class="list-group-item border-0 px-0">';
print    '        <div class="form-check form-switch ps-0">';
print    '            <input class="form-check-input ms-5" type="checkbox" name="gerer_factures" id="flexSwitchCheckDefault"';
     
      if($ro["gerer_factures"] == 1)
 {
 print    ' checked';
 }
print    '>';
 
print    '   <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Gérer les factures</label>';
print    '        </span>';
print    '       </div>';
print    '     </li>';
 if($rol == 1){ 

print    '   <li class="list-group-item border-0 px-0">';
print    '   <div class="form-check form-switch ps-0">';
print    '   <input type="hidden"  name="id"  value="'.$row["id"].'">';
print ' <button type="submit" id="submitBtn" class="btn btn-dark ">Editer Options</button>';
print    '   </div>';
print    '   </li>';

 print    ' </form>'; 	 
				    
	}			  
 

print    ' </div>';
print    ' </div>';
print    ' </div>';
print    ' </div>';
print    ' </div>';
print    '</table>';
 

}

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#submitBtn").click(function(){        
        $("#myForm").submit(); // Submit the form
    });
});
</script>