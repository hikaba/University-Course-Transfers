<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    query to the database and returns western course data 
-->
<?php
$query = "SELECT * FROM WesternCourse";
$sortBy = $_POST["sortBy"];
$orderBy = $_POST["orderBy"]
?>

<?php

// if courseNumber and ascending is selected concatenate new statment onto $sql
if ($sortBy == "courseNumber" && $orderBy == "ascending"){
    $query .= " ORDER BY UWOCourseCode ASC";

}
// if courseNumber and descending is selected concatenate new statment onto $sql
elseif ($sortBy == "courseNumber" && $orderBy == "descending"){
    $query .= " ORDER BY UWOCourseCode DESC";
}
// if courseName and ascending is selected concatenate new statment onto $sql
elseif ($sortBy == "courseName" && $orderBy == "ascending"){
    $query .= " ORDER BY CourseName ASC";
}
// if courseName and descending is selected concatenate new statment onto $sql
elseif ($sortBy == "courseName" && $orderBy == "descending"){
    $query .= " ORDER BY CourseName DESC";
}
//otherwise display table without any sorting
else{
    $query = "SELECT * FROM WesternCourse";
}


$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<table border='1'>
<tr>
<th><strong>Course Code</strong></th>
<th><strong>Name</strong></th>
<th><strong>Weight</strong></th>
<th><strong>Suffix</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>";
?>
<script>
function myFunction() {
  alert("This course may be an equivalent to another course(s). Are you sure you would like to delete this course? After it's been deleted, it can't be undone.");
}
</script>
<?php

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td align='center'><a href = 'getWesternCourse.php?id=".$row['UWOCourseCode']. "'>" .$row['UWOCourseCode']. "</a></td>";
    echo "<td align='center'>" . $row['CourseName'] . "</td>";
    echo "<td align='center'>" . $row['CourseWeight'] . "</td>";
    echo "<td align='center'>" . $row['Suffix'] . "</td>";
    echo "<td align='center'><a href = 'editCourse.php?id=".$row['UWOCourseCode']. "'>Edit</a></td>";
    echo "<td><a onClick=\" myFunction()\" href='deleteCourse.php?id=".$row['UWOCourseCode']. "'>Delete</a></td>";

    echo "</tr>";
    }
echo "</table>";
mysqli_free_result($result);
?>
