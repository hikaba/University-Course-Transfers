<!--
    CS 3319A
    ASSIGNMENT 3
    Name: Hiba Kaawan
    ID: 250921401  
    adds new course into db
 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Western: UWO Courses and Equivalencies</title>
</head>
<body bgcolor = "#4F2683">
<font color = "white">
<?php
    include 'dbconnection.php';
?>
<?php
    $code = $_POST["ccode"];
    $name = $_POST["cname"];
    $weight = $_POST["cweight"];
    $suffix = $_POST["csuffix"];
    if($suffix == "none" ){
        $suffix = '';
    }
    $check = 'SELECT UWOCourseCode FROM WesternCourse WHERE UWOCourseCode = "'.$code.'"';
    $query = 'INSERT INTO WesternCourse VALUES ("'.$code.'","'.$name.'","'.$weight.'","'.$suffix.'")';
    
    $checkresult = mysqli_query($connection,$check);
    if(!$checkresult){
        die("Error".mysqli_error($connection));
    }
    if (mysqli_num_rows($checkresult) > 0) {
        echo "<h3>Sorry, you're request could not be processed. A course with this code already exists!</h3>";
    }
    else{
        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Error while trying to add new course ".mysqli_error($connection));
        }
        else{
        echo"<h3>Course Was Added Successfully</h3>";
        }

    }
    mysqli_close($connection);
?>
<br><br><br>
<form action="UWOCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>