<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    
    // Check for empty fields
    if (empty($student_id) || empty($first_name) || empty($last_name)) {
        if (empty($student_id)) {
            echo "<font color='red'>Student ID field is empty.</font><br/>";
        }

        if (empty($first_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }

        if (empty($last_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } elseif (!preg_match('/^\d{8}$/', $student_id)) {
        // Check if student ID has exactly 8 digits
        echo "<font color='red'>Student ID must be 8 digits.</font><br/>";
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // Check if the student ID already exists
        $checkQuery = "SELECT * FROM students WHERE student_id = '$student_id'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<font color='red'>Student ID already exists!</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // If all the conditions are met

            // Insert data into the database
            $result = mysqli_query($conn, "INSERT INTO students (`student_id`, `first_name`, `last_name`) VALUES ('$student_id', '$first_name', '$last_name')");
            
            // Display success message with the desired class
            echo "<p><font color='green' class='w3-button w3-black w3-round-small'>Data added successfully!</font></p>";
            echo "<a href='index.php' class='w3-button w3-black w3-round-small'>View Result</a>";
        }
    }
}
?>
