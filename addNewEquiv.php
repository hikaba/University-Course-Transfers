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

    $UWOCourseCode = $_POST["wcourse"];
    $CourseCode_temp = $_POST["ocourse"];
    $CourseCode_explode = explode('|',$CourseCode_temp);
    $CourseCode = $CourseCode_explode[0];
    $IDNumber = $CourseCode_explode[1];
    $DateOfDecision = date("Y-m-d");

    
    $check = 'SELECT * FROM CourseEquivalencies WHERE UWOCourseCode = "'.$UWOCourseCode.'" AND CourseCode = "'.$CourseCode.'"';
    $query = 'INSERT INTO CourseEquivalencies(UWOCourseCode,CourseCode,IDNumber,DateOfDecision) VALUES("'.$UWOCourseCode.'", "'.$CourseCode.'","'.$IDNumber.'", "'.$DateOfDecision.'");';
    $queryUpdate = "UPDATE CourseEquivalencies SET DateOfDecision = '".$DateOfDecision."' WHERE UWOCourseCode = '".$UWOCourseCode."' AND CourseCode = '".$CourseCode."'";
    $result = mysqli_query($connection, $check); //checks to see if equivalency already exists


    if(!$result){
        die("Query Error");
    }else{
        if(mysqli_num_rows($result) > 0){
            
    
            if (!mysqli_query($connection,$queryUpdate)){
                die("Error adding new equivalency".mysqli_error($connection));
            }else{
                echo "<h3>Equivalency Was Updated Successfully</h3>";
            }
    
        }else{
            if (!mysqli_query($connection, $query)){
                die("Error adding new equivalency".mysqli_error($connection));
            }else{
                echo "Equivalency Was Added Successfully";
            }
        }
    }
    
?>
<br><br>
<form action="outsideCourseData.php">
    <input type="submit" value="Previous Page">
</form>
</font>
</body>
</html>

