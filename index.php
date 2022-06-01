<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    webpage that allows user to select what data they would like to view from a dropdown menu and redirects them to that webpage
 -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<meta charset="utf-8">
<title>Western: UWO Courses and Equivalencies</title>
</head>
<body bgcolor = "#4F2683"> 
<font color = "#94618E">

<?php
include 'dbconnection.php';
?>

<h1>UWO Courses and Outside Course Equivalencies Database</h1>
<h2>Select the data you would like to view:</h2>


<form action="redirect.php" method="post">
  <select name="pickdata" id="pickdata">
    <option value="No Option Selected">Select Here</option>
    <option value="Western Course Data">Western Course Data</option>
    <option value="Outside Courses Data">Outside Courses Data</option>
  </select>
  <br><br>
  <input type="submit" name="button" value="Submit">
</form>


</font>
</body>
</html>