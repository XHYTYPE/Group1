<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/forgotpass.css">
    <link rel="stylesheet" href="css/about.css">
    <!--Icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font-icon -->
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
    <style>
        .content {
        background-image: url("images/bck.jpg"); /* Replace with your image file path */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment:scroll;
    }
    </style>
    
    
</head>

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

    <!-- contact us -->
    <div class="container-contact" id="contactOverlay">
        <div class="contact-form">

            <h3>CONTACT US</h3>
            <i class="fa fa-times-circle" id="closeContactForm" style="font-size:24px"></i>
            <hr style="border-color: #069952; margin-top: 20px;">
            <form id="contact-form">
                <div class="form-contact-name">
                    <input type="text" placeholder="NAME" id="name" name="name" required>
                </div>
                <div class="form-contact-useremail">
                    <input type="input" placeholder="EMAIL" id="contactemail" name="contactemail" required>
                </div>

                <h4>MESSAGE</h4>
                <div class="text-message">
                    <textarea id="message" name="message"></textarea>
                </div>
                <hr style="border-color: #069952; margin-top: 20px;">
                <button type="submit" id="submit-btn">SUBMIT</button>
            </form>
        </div>
    </div>

    <!--Login-->
    <div class="content">
        <h1 class="Welcome">Welcome to our Appointment System!</h1>
        <img src="images/logo.png" alt="logo" class="logohome">
        <div class="container-login">
            <div class="login-form">
                <h3>Login</h3>
                <form id="login-form">
                    <div class="form-group">
                        <input type="text" placeholder="USERNAME / EMAIL" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="PASSWORD" id="password" name="password" required>
                    </div>
                    <div class="form-group-checkbox">
                        <input type="checkbox" value="lsRememberMe" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                        <h5 id="forgotpass">Forgot Password?</h5>
                    </div>
                    <a href="UserDashboard.php"><button type="submit" id="login-btn">LOG IN</a></button>
                    <p class="register-lbl">Don't have an account?</p><a href ="Register.php" class="Register"> Sign up here</a>
                </form>
            </div>
        </div>
    </div>

    <!--about us-->
    <div class="aboutus" id="aboutUs">
        <h1 class="aboutusLabel">About Us</h1>
        <section class="aboutuSection">
            <div class="aboutus-row">
                <!--Column One-->
                <div class="column-aboutus">
                    <div class="card-aboutus">
                        <div>
                            <img src="images/doc.png" alt="doc">
                        </div>
                    </div>
                </div>
                <!--Column Two-->
                <div class="column-aboutus">
                    <div class="card-aboutus">
                        <div class="aboutus-card-lbl">
                            <h2>Center with Innovative<br> Approach to Treatment</h2>
                        </div>
                        <ul>
                            <li class="aboutus-list">Nemo ipsam egestas volute turpis dolores ut aliquam quaerat sodales sapien undo pretium purus feugiat dolor impedit</li>
                            <li class="aboutus-list">Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. Quisque vel laoreet turpis urna augue, viverra a augue eget, dictum tempor diam pulvinar massa purus nulla</li>
                        </ul>
                    </div>
                </div>
    </div>

    <!--Forgot Pass-->
    <div class="container-forgotpass" id="forgotpassOverlay">
        <div class="forgotpass-form">
            <h3>Forgot Password?</h3>
            <i class="fa fa-times-circle" id="closeForgotForm" style="font-size:24px"></i>
            <hr style="border-color: #069952; margin-top: 20px;">
            <form id="forgotpass-form">
                <div class="form-group-forgot">
                    <input type="text" placeholder="EMAIL" id="email-forgot-pass" name="email-forgot-pass" required>
                </div>
                <hr style="border-color: #069952; margin-top: 20px;">
                <button type="submit" id="submit-forgotpass">SUBMIT</button>
            </form>
        </div>
    </div>

        <section class="keyfeatures">
            <div class="row">
                <h1> Our Features</h1>
            </div>
            <div class="row">
                <!--Column One-->
                <div class="column">
                    <div class="card">
                        <div class="icon">
                            <span class="material-symbols-outlined" style="font-size:50px;">clinical_notes</span>
                        </div>
                        <h3>Personalized Treatment</h3>
                        <p>
                            Far far away, behind the word mountains,
                            far from the countries Vokalia
                        </p>
                    </div>
                </div>
                <!--Column Two-->
                <div class="column">
                    <div class="card">
                        <div class="icon">
                            <span class="material-symbols-outlined" style="font-size:50px;">ecg_heart</span>
                        </div>
                        <h3>Quality & Safety</h3>
                        <p>
                            Far far away, behind the word mountains,
                            far from the countries Vokalia
                        </p>
                    </div>
                </div>
                <!--Column three-->
                <div class="column">
                    <div class="card">
                        <div class="icon">
                            <span class="material-symbols-outlined"  style="font-size:50px;" >medical_services</span>
                        </div>
                        <h3>Immidiate Service</h3>
                        <p>
                            Far far away, behind the word mountains,
                            far from the countries Vokalia
                        </p>
                    </div>
                </div>
                <!--Column four-->
                <div class="column">
                    <div class="card">
                        <div class="icon">
                            <span class="material-symbols-outlined" style="font-size:50px;">stethoscope</span>
                        </div>
                        <h3>Experience Physicians</h3>
                        <p>
                            Far far away, behind the word mountains,
                            far from the countries Vokalia
                        </p>
                    </div>
                </div>
            </div>
        </section>


    <script src="function.js"></script>

</body>
</html>