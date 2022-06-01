<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Western: UWO Courses and Equivalencies</title>
</head>
<body bgcolor = "#4F2683">
<font color = "white">
<h2>Edit a Course</h2>

<?php
    include 'dbconnection.php';
    $UWOCourseCode=$_GET['id'];
    $query = 'SELECT * FROM WesternCourse WHERE UWOCourseCode = "'.$UWOCourseCode.'"';
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Error".mysqli_error($connection));
    }
$row = mysqli_fetch_assoc($result);
?>

<form action="editUWOCourse.php" method="post">

<label for="ccode">Course Code:</label>
<?php
echo"<input type='text' id='ccode' name='ccode' value = '".$row["UWOCourseCode"]."'readonly><br><br>";
?>

<label for="cname">Course Name:</label>
<?php
echo "<input type='text' name='cname' id='cname' value='".$row["CourseName"]."'><br><br>";
?>

<label for="cweight">Course Weight:</label>
    <select name="cweight" id="cweight" required>
        <option value="0.5">0.5</option>
        <option value="1.0">1.0</option>
    </select>
    <br><br>
    <label for="csuffix">Course Suffix:</label>
    <select name="csuffix" id="csuffix" required>
        <option value="none">Full Year Course (no suffix)</option>
        <option value="A/B">A/B</option>
        <option value="F/G">F/G</option>
        <option value="E">E</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>
    </select>   
    <input type="submit" value="Update">
</form>


<br><br><br><br>
<form action="UWOCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>