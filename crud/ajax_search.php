<?php
// Include the database connection file
require_once("dbConnection.php");
require_once("functions.php");

// Get the search text and searchBy from the AJAX request
$searchText = $_GET['searchText'] ?? '';
$searchBy = $_GET['searchBy'] ?? 'studentId';

// Define valid searchBy options
$searchByOptions = ['studentId', 'firstName', 'lastName'];

// Ensure $searchBy is a valid option, default to 'studentId' if not
$searchBy = in_array($searchBy, $searchByOptions) ? $searchBy : 'studentId';

// Fetch data based on the search criteria and search text
if (!empty($searchText)) {
    $result = searchStudents($searchBy, $searchText);
    
    // Output the search results in HTML format
    echo '<div id="studentTable" class="table-container w3-center">';
    echo '<table width="80%" border="0">';
    echo '<tr bgcolor="#DDDDDD">';
    
    // Manually define the table headers
    echo '<td><strong>Student ID</strong></td>';
    echo '<td><strong>First Name</strong></td>';
    echo '<td><strong>Last Name</strong></td>';
    echo '<td><strong>Action</strong></td>';
    echo '</tr>';

    if ($result) {
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Manually display data based on the defined columns
            echo "<td>{$res['student_id']}</td>";
            echo "<td>{$res['first_name']}</td>";
            echo "<td>{$res['last_name']}</td>";
            echo "<td>
                    <a href=\"edit.php?id={$res['id']}\">
                        <button class=\"w3-button w3-black w3-round-small\">Update</button>
                    </a> 
                    <a href=\"delete.php?id={$res['id']}\" 
                        onclick=\"return confirm('Are you sure you want to delete?')\">
                        <button class=\"w3-button w3-black w3-round-small\">Delete</button>
                    </a>
                </td>";
            echo "</tr>";
        }
    } else {
        // Handle the case where the query fails
        echo "<tr><td colspan='4'>No results found.</td></tr>";
    }

    echo '</table>';
    echo '</div>';
} else {
    // If no search text is provided, you might want to show all results or a default set of results
    // For now, let's assume you want to show all students
    $resultAll = getAllStudents();
    
    // Output all results in HTML format
    echo '<div id="studentTable" class="table-container w3-center">';
    echo '<table width="80%" border="0">';
    echo '<tr bgcolor="#DDDDDD">';
    
    // Manually define the table headers
    echo '<td><strong>Student ID</strong></td>';
    echo '<td><strong>First Name</strong></td>';
    echo '<td><strong>Last Name</strong></td>';
    echo '<td><strong>Action</strong></td>';
    echo '</tr>';

    if ($resultAll) {
        while ($res = mysqli_fetch_assoc($resultAll)) {
            echo "<tr>";
            // Manually display data based on the defined columns
            echo "<td>{$res['student_id']}</td>";
            echo "<td>{$res['first_name']}</td>";
            echo "<td>{$res['last_name']}</td>";
            echo "<td>
                    <a href=\"edit.php?id={$res['id']}\">
                        <button class=\"w3-button w3-black w3-round-small\">Update</button>
                    </a> 
                    <a href=\"delete.php?id={$res['id']}\" 
                        onclick=\"return confirm('Are you sure you want to delete?')\">
                        <button class=\"w3-button w3-black w3-round-small\">Delete</button>
                    </a>
                </td>";
            echo "</tr>";
        }
    } else {
        // Handle the case where the query fails
        echo "<tr><td colspan='4'>No results found.</td></tr>";
    }

    echo '</table>';
    echo '</div>';
}
?>
