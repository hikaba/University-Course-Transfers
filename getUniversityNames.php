<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    webpage that queries the university names and nicknames for the province the user selected
 -->
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Outside Universities</title>
</head>
<body bgcolor = "#EFEFEF"> 
<font color = "#8E8D8A">
<h1>Universities in this Province</h1>
<?php

include 'dbconnection.php';

$Province=$_GET['id'];
$query ='SELECT Name, NickName FROM University WHERE Province= "'.$Province.'"';
$result = mysqli_query($connection,$query);

if(!$result){
    die("databases query failed.".mysqli_error($connection));
}
echo "<table border='1'>
<tr>
<th><strong>University</strong></th>
<th><strong>Nick Name</strong></th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td align='center'>" . $row['Name'] . "</td>";
    echo "<td align='center'>" . $row['NickName'] . "</td>";
    echo "</tr>";
    }
echo "</table>";
mysqli_free_result($result);
mysqli_close($connection);
?>
<br><br>
<form action="outsideCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</body>
</html>