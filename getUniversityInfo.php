<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    webpage that lists information on the university including the courses it offers base on what the user selected
 -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Outside Courses</title>
</head>
<body bgcolor = "#EFEFEF"> 
<font color = "#8E8D8A">
<h1>University Information</h1>
<?php

include 'dbconnection.php';

$Name=$_GET['id'];
$query ='SELECT * FROM University WHERE Name= "'.$Name.'"';
$result = mysqli_query($connection,$query);

if(!$result){
    die("databases query failed.".mysqli_error($connection));
}
$row = mysqli_fetch_assoc($result);
echo "ID Number: ".$row["IDNumber"]."<br>";
echo "University Name: ".$row["Name"]."<br>";
echo "City: ".$row["City"]."<br>";
echo "Province: ".$row["Province"]."<br>";
echo "NickName: ".$row["NickName"]."<br><br>";
echo "Course(s) Offered Here: <br>";

mysqli_free_result($result);
$query2 = 'SELECT CrName, CourseCode FROM OutsideCourse, University WHERE University.IDNUmber=OutsideCourse.IDNumber AND Name= "'.$Name.'"';
$result2 = mysqli_query($connection,$query2);
if(!$result2){
    die("databases query failed.".mysqli_error($connection));
}
if (empty($row = mysqli_fetch_assoc($result2))) {
    echo "None";
  }
else{
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result2)) {
        echo "<li>";
        echo $row["CourseCode"] . " " . $row["CrName"] . "</li>";
    }
}
echo "</ol>";
mysqli_free_result($result2);

mysqli_close($connection);
?>
<form action="outsideCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</body>
</html>