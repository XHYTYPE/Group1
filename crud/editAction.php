<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Get the data from the form
    $id = $_POST['id'];
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    // Check for empty fields
    if (empty($student_id) || empty($first_name) || empty($last_name)) {
        echo "<font color='red'>Student ID, First Name, and Last Name fields must not be empty.</font><br/>";
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Update data in the database
        $result = mysqli_query($conn, "UPDATE students SET student_id='$student_id', first_name='$first_name', last_name='$last_name' WHERE id=$id");

        // Display success message
        echo "<font color='green'>Data updated successfully.</font><br/>";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
