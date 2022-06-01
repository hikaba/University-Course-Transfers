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
    <title>Outside Courses</title>
</head>
<body bgcolor = "#EFEFEF">
<font color = "#8E8D8A">
<?php
include 'dbconnection.php';
?>
<h1>Courses Offered at Other Universities</h1>

<!-- query to the database and the list of universities ordered by province -->
<?php
    include 'getOutsideCourseData.php';
?>
<h2>Universities With No Associated Courses</h2>
<?php
include 'dbconnection.php';
$query = "SELECT * FROM University WHERE IDNumber NOT IN (Select IDNumber FROM OutsideCourse);";
$result = mysqli_query($connection, $query);
if(!$result){
    die("Query Error".mysqli_error($connection));
}
echo "<table border='1'>
<tr>
<th><strong>University</strong></th>
<th><strong>NickName</strong></th>

</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td align='center'>" . $row['Name'] . "</td>";
    echo "<td align='center'>" . $row['NickName'] . "</td>";

    echo "</tr>";
    }
echo "</table>";
mysqli_free_result($result);
?>
<p>
<hr>
<p>

<h2>View Equivalencies By Date</h2>

<form action="getEquivData.php" method="post">
    <h4>Select a date to view course equivalencies:</h4>
    <label for="equivDate">Date:</label>
    <input type="date" id="equivDate" name="equivDate" required><br><br>
    <input type="submit" value="Get Data">
</form>

<?php
include 'dbconnection.php';
$query = "SELECT UWOCourseCode, CourseName FROM WesternCourse";
$query2 = "SELECT CourseCode, CrName, IDNumber FROM OutsideCourse";
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query2);
if(!$result){
    die("databases query failed.".mysqli_error($connection));
}
if(!$result2){
    die("databases query failed.".mysqli_error($connection));
}
?>
<p>
<hr>
<p>
<h2>Add New Equivalency</h2>
<!-- form that allows user to add a new course to our database -->
<form action="addNewEquiv.php" method="post">

    <label for="wcourse">Western Course:</label>
    
    <select name='wcourse' id='wcourse' required>
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        echo "<option value='". $row["UWOCourseCode"]."'>". $row["UWOCourseCode"]." ".$row["CourseName"]. "</option>";
    }
    ?>
   </select>

    <br><br>
    <label for="ocourse">Outside Course:</label>
    
    <select name='ocourse' id='ocourse' required>
    <?php
    while ($row = mysqli_fetch_assoc($result2)){
        echo "<option value='".$row["CourseCode"]."|".$row["IDNumber"]."'>".$row["CourseCode"]." ".$row["CrName"]."</option>";

    }
    ?>
    </select><br><br>
    <input type="submit" value="Make Equivalent">
</form>
<?php
mysqli_free_result($result);
mysqli_free_result($result2);
?>
<br><br>
<form action="index.php">
<input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>
