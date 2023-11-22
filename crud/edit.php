<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$student_id = $resultData['student_id'];
$first_name = $resultData['first_name'];
$last_name = $resultData['last_name'];
?>

<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <h2>Edit Data</h2>
    <p>
        <a href="index.php" class="w3-button w3-black w3-round-small">Home</a>
    </p>
    
    <form name="edit" method="post" action="editAction.php">
        <table border="0">
            <tr> 
                <td>Student ID</td>
                <td><label><?php echo $student_id; ?></label></td>
            </tr>
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="first_name" value="<?php echo $first_name; ?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update" class="w3-button w3-black w3-round-small"></td>
            </tr>
        </table>
    </form>
</body>
</html>
