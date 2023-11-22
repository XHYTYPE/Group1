<?php

include 'php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for registration
    if (isset($_POST["register"])) {
        handleRegistration($conn); // Pass the $conn variable to the function
    }
}

function handleRegistration($conn) {
    // Retrieve user input from the registration form
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $birthdate = $_POST["birthdate"];
    $mobileNumber = $_POST["mobilenumber"];
    $newEmail = $_POST["newemail"];
    $newPassword = $_POST["newpassword"];
    $confirmPassword = $_POST["confirmpassword"];

    // Validate the input
    if (!isValidName($firstName) || !isValidName($middleName) || !isValidName($lastName)) {
        echo "Invalid name format. Names should consist of letters and spaces only.";
        return;
    }

    if (!ctype_digit($mobileNumber)) {
        echo "Invalid mobile number format. Mobile number should consist of numbers only.";
        return;
    }

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL) || !endsWith($newEmail, '@gmail.com')) {
        echo "Invalid email format. Please use a valid Gmail address.";
        return;
    }

    if (empty($newPassword) || empty($confirmPassword)) {
        echo "Both password fields are required.";
        return;
    }

    if ($newPassword != $confirmPassword) {
        echo "Passwords do not match.";
        return;
    }

    // Check if the email already exists in the database
    $emailCheckQuery = "SELECT * FROM table_users WHERE email = '$newEmail'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        echo "Email already exists. Please use a different email address.";
        return;
    }

    // Hash the password before storing it in the database for security
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Insert the user information into the database
    $insertQuery = "INSERT INTO table_users (first_name, middle_name, last_name, birthdate, mobile_number, email, password) VALUES ('$firstName', '$middleName', '$lastName', '$birthdate', '$mobileNumber', '$newEmail', '$hashedPassword')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

function isValidName($name) {
    return preg_match("/^[a-zA-Z ]+$/", $name);
}

// Function to check if an email address is valid
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && endsWith($email, '@gmail.com');
}

// Function to check if a string ends with a specific substring
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    return $length === 0 || (substr($haystack, -$length) === $needle);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/forgotpass.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/about.css">
    
    <!-- Icon Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Font Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        $(document).ready(function () {
            $('.material-icons').click(function () {
                $('ul').toggleClass('show');
            });
        });
    </script>
    
</head>
<style>
.content {
    background-image: url("images/bck.jpg"); /* Replace with your image file path */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment:scroll;
}
</style>
<body>

       <!--Navigation bar-->
       <div class="navigation">
        <nav>
            <label class="logo1">BARANGAY</label><br>
            <label class="logo2">Health Center</label>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><h6 id="contact-btn">Contact Us</h6></li>
            </ul>
            <i class="material-icons">&#xe5d2;</i>
        </nav>
    </div>

<div class="content">
    <div class="container-signin">
        <div class="signin-form">
            <h3>Register as New Account</h3>
            <form id="signin-form" method="post">
                <div class="form-group">
                    <input type="text" placeholder="FIRST NAME" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="MIDDLE NAME" id="middlename" name="middlename" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="LAST NAME" id="lastname" name="lastname" required>
                </div>
                <h4>Select Date of Birth</h4>
                <div class="form-group-birthdate">
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="MOBILE NUMBER (09XXXXXXXXX)" id="mobilenumber" name="mobilenumber" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="ENTER NEW EMAIL" id="newemail" name="newemail" required>
                </div>
                <div class="form-group-password">
                    <input type="password" placeholder="ENTER NEW PASSWORD" id="newpassword" name="newpassword" required>
                </div>
                <br>
                <div class="form-group-password">
                    <input type="password" placeholder="CONFIRM NEW PASSWORD" id="confirmpassword" name="confirmpassword" required>
                </div>
                <button type="submit" id="signup-btn" name="register">SIGN UP</button>
            </form>
            
        </div>
    </div>
</div>
    <script src="function.js"></script>
</body>
</html>
