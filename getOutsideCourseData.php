<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    php file that gets the name and province of all the univeristies and puts into a table
 -->
<?php
$query = "SELECT Name, Province FROM University ORDER BY City";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.".mysqli_error($connection));
}
echo "<table border='1'>
<tr>
<th><strong>University</strong></th>
<th><strong>Province</strong></th>

</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td align='center'><a href = 'getUniversityInfo.php?id=".$row['Name']. "'>" .$row['Name']. "</a></td>";
    echo "<td align='center'><a href = 'getUniversityNames.php?id=".$row['Province']. "'>" .$row['Province']. "</a></td>";
    echo "</tr>";
    }
echo "</table>";
mysqli_free_result($result);

?>