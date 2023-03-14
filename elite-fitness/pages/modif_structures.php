<?php
session_start();
$page = 'Modifier_Structures';
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
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Liste des structures</h4>
        </div>
		<?php
		if($rol == 1){
			?>
        <div>
        <a href="./crud_structures/create.php"> 
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Ajouter une structure</button>
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
        <div class="table-responsive">



<script>
$(document).ready(function(){
	$(".btn-group .btn").click(function(){
		let inputValue = $(this).find("input").val();
		if(inputValue != 'all'){
			let target = $('table tr[data-status="' + inputValue + '"]');
			$("table tbody tr").not(target).hide();
			target.fadeIn();
		} else {
			$("table tbody tr").fadeIn();
		}
	});
	// Changing the class of status label to support Bootstrap 4
    let bs = $.fn.tooltip.Constructor.VERSION;
    let str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
        	let classStr = $(this).attr("class");
            let newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>

</head>
<body>
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <!-- <div class="col-sm-6"><h2>Manage <b>Domains</b></h2></div> -->
                    <div class="col-sm-6">
                        
						
						
						
						<div class="btn-group">
                        <label class="btn btn-info active"><input  name="storage" type="radio" class="common_selector " value="(1 2)"  > Tous</label>
						<label class="btn btn-success"><input name="storage" type="radio" class="common_selector storage" value="1"  > Active</label>
						<label class="btn btn-warning"><input name="storage" type="radio" class="common_selector storage" value="0"  > Inactive</label>
						</div>
                    </div>
                </div>
            </div>

          <div class="row filter_data">

                </div>
            </div>   

</div>
</div>        
</div>
</div>


    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
 

<?php
// include("../app/database/db.php");
include './_partials/footer.php';
include './_partials/scripts.php';
?>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
		 var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
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