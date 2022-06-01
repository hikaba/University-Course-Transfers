<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    this php file redirects the user to the webpage according to what they selected from the dropdown menu in index.php
 -->
<?php
include 'dbconnection.php';
?>

<?php
$whichTable = $_POST["pickdata"]; //gets selected table from the form

if ($whichTable == "Western Course Data"){
    header("Location: UWOCourseData.php");
}
else {
    header("Location: outsideCourseData.php");

}
   mysqli_close($connection);
?>
