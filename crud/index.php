<?php
// Include the database connection file
require_once("dbConnection.php");
require_once("functions.php");

$searchText = $_GET['searchText'] ?? '';

// Fetch all column names from the table
$columns = [];

// Fetch data based on the search text
if (!empty($searchText)) {
    $result = searchStudents($searchText);
    
    // Fetch columns only if there are search results
    if ($result) {
        $columns = mysqli_fetch_fields($result);
    }
} else {
    $result = getAllStudents();

    // Fetch columns only if there are results
    if ($result) {
        $columns = mysqli_fetch_fields($result);
    }
}
?>

<html>
<head>    
    <title>Student Maintenance</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(document).ready(function () {
        // Trigger the search function when the user types in the search box
        $("#searchText").autocomplete({
            source: 'ajax_search.php',
            select: function (event, ui) {
                // Trigger the search function when an item is selected from the autocomplete list
                search();
            },
            change: function (event, ui) {
                if (!ui.item) {
                    // Trigger the search function when the user clears the search text
                    search();
                }
            }
        });

        // Trigger the search function when the user changes the search by option
        $("#searchBy").change(function () {
            search();
        });

        // Trigger the search function when the user types in the search box
        $("#searchText").on("input", search);

        // Initial search when the page loads
        search();
    });

    function search() {
        var searchText = $("#searchText").val();
        var searchBy = $("#searchBy").val();

        $.ajax({
            type: "GET",
            url: "ajax_search.php",
            data: { searchText: searchText, searchBy: searchBy },
            success: function (response) {
                // Replace the HTML content of the table with the search results
                $("#studentTable").html(response);
            }
        });
    }
</script>

</head>

<body>
    <h2 class="w3-center">Student List</h2>
    
    <p class="add-container w3-center">
        <a href="add.php">
            <button class="w3-button w3-black w3-round-small">Add New Data</button>
        </a>
    </p>
    
    <h2>Search Students</h2>
    <div class="search-container">
        <label id="searchByLabel" for="searchBy">Search By:</label>
        <select id="searchBy">
            <option value="studentId">Student ID</option>
            <option value="firstName">First Name</option>
            <option value="lastName">Last Name</option>
        </select>
    </div>
    <div class="search-container">
        <label id="searchTextLabel" for="searchText">Search Text:</label>
        <input type="text" id="searchText">
    </div>
    <div id="searchResults"></div>

    <?php
if ($columns) {
    echo '<div id="studentTable" class="table-container w3-center">';
    echo '<table width="80%" border="0">';
    echo '<tr bgcolor="#DDDDDD">';

    // Display table headers based on the columns
    foreach ($columns as $column) {
        echo "<td><strong>{$column->name}</strong></td>";
    }
    echo '<td><strong>Action</strong></td>';
    echo '</tr>';

    if ($result) {
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Display data based on the columns
            foreach ($columns as $column) {
                echo "<td>{$res[$column->name]}</td>";
            }
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
        echo "<tr><td colspan='".(count($columns) + 1)."'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
    }

    echo '</table>';
    echo '</div>';
} else {
    echo '<p class="w3-center">No results found.</p>';
}
?>

</body>
</html>
