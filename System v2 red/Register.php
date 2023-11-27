<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiter</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
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
    <div class="navigation">
        <nav>
            <label class="logo1">BARANGAY</label><br>
            <label class="logo2">Health Center</label>
        </nav>
    </div>

    <div class="content">
        <!--Register-->
        <div class="container-signin">
            <div class="signin-form">
                <h3>Register as New Account</h3>
                <form id="signin-form">
                <div class="form-group">
                    <input type="text" placeholder="FIRST NAME" id="firstname" name="firstame" required>
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
                    <input type="text" placeholder="ENTER NEW PASSWORD" id="newpassword" name="newpassword" required>
                </div>
                <div class="form-group-password">
                    <input type="text" placeholder="CONFIRM NEW PASSWORD" id="confirmpassword" name="confirmpassword" required>
                </div>
                <button type="submit" id="signup-btn">SIGN UP</button>
                <p class="register-lbl">Already have an account?</p><a href ="Home.php" class="Register"> Log in here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>