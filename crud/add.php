<html>
<head>
    <title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <h2>Add Data</h2>
    <p>
        <a href="index.php" class="w3-button w3-black w3-round-small">Home</a>
    </p>

    <form action="addAction.php" method="post" name="add">
        <table width="25%" border="0">
            <tr> 
                <td>Student ID</td>
                <td><input type="text" name="student_id"></td>
            </tr>
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="first_name"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="last_name"></td>
            </tr>
            <tr> 
                <td></td>
				<td><button type="submit" name="submit" class="w3-button w3-black w3-round-small">Add</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
