<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    webpage that queries the western course information and the equivalent courses information based on which UWO course number the user selected
 -->
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Western: UWO Courses and Equivalencies</title>
</head>
<body bgcolor = "#EFEFEF"> 
<font color = "#8E8D8A">
<h1>UWO Course and Equivalencies</h1>
<?php

include 'dbconnection.php';

$UWOCourseCode=$_GET['id'];
$query = 'SELECT CourseName, CourseEquivalencies.UWOCourseCode, CourseWeight, Suffix, Name, CrName, CourseEquivalencies.CourseCode, CrWeight, DateOfDecision
FROM OutsideCourse, University, WesternCourse, CourseEquivalencies
WHERE WesternCourse.UWOCourseCode = "'.$UWOCourseCode.'" 
AND OutsideCourse.IDNumber = CourseEquivalencies.IDNumber
AND WesternCourse.UWOCourseCode = CourseEquivalencies.UWOCourseCode
AND University.IDNumber = OutsideCourse.IDNumber
AND OutsideCourse.CourseCode = CourseEquivalencies.CourseCode';
$result = mysqli_query($connection,$query);

if(!$result){
    die("databases query failed.".mysqli_error($connection));
}
$query2 = 'SELECT CourseEquivalencies.CourseCode
FROM WesternCourse, CourseEquivalencies
WHERE WesternCourse.UWOCourseCode = "'.$UWOCourseCode.'" 
AND WesternCourse.UWOCourseCode = CourseEquivalencies.UWOCourseCode';
$result2 = mysqli_query($connection,$query2);

if (empty($row = mysqli_fetch_assoc($result2))) {
    echo "There is no Equivalent course for this course";
  }
else{
    echo "<table border='1'>
    <tr>
    <th><strong>UWO Course Name</strong></th>
    <th><strong>UWO Course Code</strong></th>
    <th><strong>UWO Course Weight</strong></th>
    <th><strong>UWO Course Suffix</strong></th>
    <th><strong>University </strong></th>
    <th><strong>Course Name</strong></th>
    <th><strong>Course Code</strong></th>
    <th><strong>Course Weight</strong></th>
    <th><strong>Date of Decision for Equivalency</strong></th>
    </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td align='center'>" . $row['CourseName'] . "</td>";
        echo "<td align='center'>" . $row['UWOCourseCode'] . "</td>";
        echo "<td align='center'>" . $row['CourseWeight'] . "</td>";
        echo "<td align='center'>" . $row['Suffix'] . "</td>";
        echo "<td align='center'>" . $row['Name'] . "</td>";
        echo "<td align='center'>" . $row['CrName'] . "</td>";
        echo "<td align='center'>" . $row['CourseCode'] . "</td>";
        echo "<td align='center'>" . $row['CrWeight'] . "</td>";
        echo "<td align='center'>" . $row['DateOfDecision'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_close($connection);
?>

<br><br>
<form action="UWOCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</body>
</html>