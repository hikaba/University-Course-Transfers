<?php

include 'dbconnection.php';

$UWOCourseCode = $_POST["ccode"];
$CourseName = $_POST["cname"];
$CourseWeight = $_POST["cweight"];
$Suffix = $_POST["csuffix"];
if($Suffix == "none" ){
    $Suffix = '';
}

$query = "UPDATE WesternCourse SET CourseName = '".$CourseName."', CourseWeight = '".$CourseWeight."', Suffix = '".$Suffix."' WHERE UWOCourseCode = '".$UWOCourseCode."';";

if (!mysqli_query($connection, $query)){
    die("Error updating course".mysqli_error($connection));
}else{
    echo"Course updated successfully";
    header('Location: UWOCourseData.php');
    exit;
}
?>
