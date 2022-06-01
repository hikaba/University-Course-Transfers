<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    php file that deletes a course from western, and deletes it from the equivalency table if it exists
 -->
<?php

include 'dbconnection.php';

$UWOCourseCode=$_GET['id'];

$query ='DELETE FROM CourseEquivalencies WHERE UWOCourseCode= "'.$UWOCourseCode.'"';
$query2 = 'DELETE FROM WesternCourse WHERE UWOCourseCode= "'.$UWOCourseCode.'"';
$result = mysqli_query($connection,$query);
$result2 = mysqli_query($connection,$query2);

if(!$result){
    die("Error while trying to delete course ".mysqli_error($connection));
}
else{
    if(!$result2){
        die("Error while trying to delete course ".mysqli_error($connection));
    }
    else{
        header("Location: UWOCourseData.php"); 
    }

}
mysqli_close($connection);
?>