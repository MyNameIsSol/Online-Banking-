<?php
$server="localhost";
$usernam="root";
$pwdd="";
$dbname="suisse";

// $server="localhost";
// $usernam="clickstat_user";
// $pwdd="Clickstate100%";
// $dbname="clickstat_database";

$conn = mysqli_connect($server,$usernam,$pwdd,$dbname);
if(!$conn){
    die('Error:connection failed '.mysqli_connect_error());
}
