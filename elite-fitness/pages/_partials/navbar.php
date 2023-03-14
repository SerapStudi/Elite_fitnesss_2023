<?php 
if(isset($_SESSION['email'])){
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
$sql = "SELECT * FROM tbl_users WHERE email = '".$_SESSION['email']."'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$rol = $row['roleid'];
$username = $row['username'];

}
else
{
	 print" <script>
setTimeout(function(){
	window.location.href = 'http://elite-fitness.fr/index.php'; 
},2);// for 5 second redirection
</script>";
}?>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
					 <img src="../assets/img/logos/capture1.png" class="avatar img-fluid rounded me-1" alt="" /> 
          <span class="align-middle">Elite Fitness</span>
		 
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
					<a class="sidebar-link" href="../pages/partenaires.php">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Partenaires</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../pages/modif_partenaires.php">
						<i class="align-middle" data-feather="edit"></i> <span class="align-middle">Modifier les partenaires</span>
            </a>
					</li>

					<li class="sidebar-item">
					<a class="sidebar-link" href="../pages/structures.php">
						<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Structures</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../pages/modif_structures.php">
						<i class="align-middle" data-feather="edit"></i> <span class="align-middle">Modifier les structures</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../pages/utilisateurs.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Les utilisateurs</span>
            </a>
					

					
					<li class="sidebar-item">
						<a class="sidebar-link" href="../pages/modif_utilisateurs.php">
              <i class="align-middle" data-feather="edit-2"></i> <span class="align-middle">Modifier les utilisateurs</span>
            </a>
					</li>
				

				
			</div>  
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

			<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
							
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
					
			  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="../assets/img/logos/logo.png" class="avatar img-fluid rounded me-1" alt="" /> <span class="text-dark"><?php print $username ?>
					
</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php"><i class="align-middle me-1" data-feather="log-out"></i> Deconnexion</a>
						
							</div>
						</li>
					</ul>
				</div>
			</nav>