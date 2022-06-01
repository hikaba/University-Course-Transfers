<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    database connection
 -->
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "hkaawanassign2db";
//create connection
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
//check connection
if(!$connection){
    die("database connection failed: " . mysqli_connect_error());
}
?>