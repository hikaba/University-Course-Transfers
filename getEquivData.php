<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Outside Courses</title>
</head>
<body bgcolor = "#EFEFEF"> 
<font color = "#8E8D8A">
<?php
include 'dbconnection.php';
?>
<h1>Course Equivalencies</h1>
<?php
include 'dbconnection.php';

$DateOfDecision = $_POST["equivDate"];
$query = 'SELECT CourseName, CourseEquivalencies.UWOCourseCode, CourseWeight, Suffix, Name, CrName, CourseEquivalencies.CourseCode, CrWeight, DateOfDecision
FROM OutsideCourse, University, WesternCourse, CourseEquivalencies
WHERE DateOfDecision <= "'.$DateOfDecision.'"
AND OutsideCourse.IDNumber = CourseEquivalencies.IDNumber
AND WesternCourse.UWOCourseCode = CourseEquivalencies.UWOCourseCode
AND University.IDNumber = OutsideCourse.IDNumber
AND OutsideCourse.CourseCode = CourseEquivalencies.CourseCode';
$result = mysqli_query($connection,$query);

if(!$result){
    die("databases query failed.".mysqli_error($connection));
}

$query2 ='SELECT * FROM CourseEquivalencies WHERE DateOfDecision <= "'.$DateOfDecision.'"';
$result2 = mysqli_query($connection,$query2);

if(!$result2){
    die("databases query failed.".mysqli_error($connection));
}

if (empty($row = mysqli_fetch_assoc($result2))) {
    echo "There were no course equivalencies made on or before this date";
}

else{
    echo "<table border='1'>
    <tr>
    <th><strong>UWO Course Name</strong></th>
    <th><strong>UWO Course Code</strong></th>
    <th><strong>UWO Course Weight</strong></th>
    <th><strong>UWO Course Suffix</strong></th>
    <th><strong>University</strong></th>
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
<form action="outsideCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>