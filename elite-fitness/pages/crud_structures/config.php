<?php
/* Database connexion */
define('DB_SERVER', 'db5012281103.hosting-data.io');
define('DB_USERNAME', 'dbu2619205');
define('DB_PASSWORD', 'SiteEliteFitness2023*@');
define('DB_NAME', 'dbs10331785');
 
/* Connexion à la base de données */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>