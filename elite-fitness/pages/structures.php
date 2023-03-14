<?php
session_start();
$page = 'structures';
include '../lib/config.php';
include '_partials/header.php';
include '_partials/navbar.php';

	class Structure extends Config {
	  // Fetch all or a single user from database
	  public function fetch() {
	    $sql = 'SELECT * FROM structure';
	   
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }
	}
?>


<div class="container">
    <h1 class="card-text mt-4">Les structures</h1>
      
           
        <div class="row mt-4">
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control" placeholder="Rechercher les structures" aria-label="Search cards"
                    onkeyup="searchFilter()">
    
            </div>
        </div>
     
<?php
		if($rol == 1){
			?>
    <a class="btn btn-primary" href="crud_structures/create.php" role="button">Nouveau structures</a>
<?php
		}
			?>

        
				<div class="btn-group">
                        <label class="btn btn-info active"><input  name="storage" type="radio" class="common_selector " value="(1 2)"  > Tous</label>
						<label class="btn btn-success"><input name="storage" type="radio" class="common_selector storage" value="1"  > Active</label>
						<label class="btn btn-warning"><input name="storage" type="radio" class="common_selector storage" value="0"  > Inactive</label>
				</div>




 <div class="row filter_data">

</div>







    <!-- This is Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> 


    <!-- this is javascript-->




 <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php
include("_partials/footer.php");
include("_partials/scripts.php");
?>

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
	
	
	
	<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
		 var storage = get_filter('storage');
        $.ajax({
            url:"fetch_datas.php",
            method:"POST",
            data:{storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });



});
</script>