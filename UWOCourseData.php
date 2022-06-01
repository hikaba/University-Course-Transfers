<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    creates a webpage that allows users to view Western Courses, sort them, and submit a form to add a new western course
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
<?php
include 'dbconnection.php';
?>
<h1>Western Course Data</h1>

<!-- form that allows user to sort data by Course name or number and by ascending or descending order -->
<form action="" method="post">
    <h4>Sort By:</h4>
    <input type="radio" id="courseNumber" name="sortBy" value="courseNumber">
    <label for="courseNumber">Course Number</label>
    <input type="radio" id="courseName" name="sortBy" value="courseName">
    <label for="courseName">Course Name</label>
    <h4>Order By:</h4>
    <input type="radio" id="ascending" name="orderBy" value="ascending">
    <label for="ascending">Ascending</label>
    <input type="radio" id="descending" name="orderBy" value="descending">
    <label for="descending">Descending</label><br>
    <input type="submit" value="Submit">
</form>

<!-- query to the database and returns western course data according to input from user -->
<?php
    include 'getWesternData.php';
?>

<p>
<hr>
<p>
<h2>Add a New Course</h2>
<!-- form that allows user to add a new course to our database -->
<form action="addNewUWOCourse.php" method="post">
    <label for="ccode">Course Code:</label>
    <input type="text" id="ccode" name="ccode" pattern="cs[0-9]{4}" title= "Must start with 'cs' followed by 4 numbers." required><br><br>

    <label for="cname">Course Name:</label>
    <input type="text" id="cname" name="cname" required><br><br>
   
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
    <input type="submit" value="Add Course">
</form>

<br><br>
<form action="index.php">
    <input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>
