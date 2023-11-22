<?php
// functions.php

require_once("dbConnection.php");

function searchStudents($searchBy = 'studentId', $searchText = '') {
    global $conn;

    // Map the search criteria to column names
    $columnMap = [
        'studentId' => 'student_id',
        'firstName' => 'first_name',
        'lastName' => 'last_name'
    ];

    // Use the mapped column name or default to 'student_id'
    $columnName = $columnMap[$searchBy] ?? 'student_id';

    // Perform the SQL query
    $query = "SELECT * FROM students WHERE $columnName LIKE '%$searchText%'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function getAllStudents() {
    global $conn;

    // Fetch all students
    $result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
    return $result;
}
?>
