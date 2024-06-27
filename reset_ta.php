<?php
    session_start();
    $ta_username = $_SESSION["reset_ta_username"];
    if(!$ta_username)  {
        echo '<script>window.alert("Login to the System First !!!"); window.location.href="forgot_ta.html"</script>';
      }
?>


<!DOCTYPE html>
    <head>
        <title>Reset Password</title>
        <style>
        .error {
            color: white;
            display: none;
        }
        .invalid {
            border-color: red;
        }
    </style>
        <link rel="stylesheet" href="login_page.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <nav>
        
            <img src="logo.png" class="img" alt="logo">
    
    
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="ta_login.html">AGENT</a></li>
                <li><a href="emp_login.html">EMPLOYEE</a></li>
                <li><a href="passenger_login.html">PASSENGER</a></li>
                <li><a href="#">FACILITIES</a></li>
                <li><a href="#">SCHEDULE</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </nav>
        <div class="background"></div>
        <div class="login_form">
            <form id="signUpForm" method="post" action="update_ta.php">
                <br><br>
                <div class="lbl2">
                    <label>Reset Password</label><br><br><br>
                </div>
                <div class="credentials_forgot">
                    <input type="username" name="ta_username" placeholder="<?php echo $ta_username;?>" required readonly>
                    <br><br><br>
                    <input type="password" name="ta_password" placeholder="New Password" id="ta_password" required>
                    <br>
                    <span class="error" id="passwordError">Password should be more than 8 characters</span>
                    <br><br>
                    <input type="password" placeholder="Confirm Password" id="confirm_password" required>
                    <br>
                    <span class="error" id="confirmPasswordError">Passwords do not match</span>
                    <br><br>
                </div>
                <div class="submit2">
                    <input type="submit" value="Update">
                    <br><br><br>
                </div>
    </form>
        </div>
        <script>
            document.getElementById("signUpForm").addEventListener("submit", function(event) {
            let isValid = true;

            // Validate Password
            const password = document.getElementById("ta_password");
            const passwordError = document.getElementById("passwordError");
            const confirmPassword = document.getElementById("confirm_password");
            const confirmPasswordError = document.getElementById("confirmPasswordError");
            if (password.value === "") {
                password.classList.add("invalid");
                passwordError.style.display = "inline";
                isValid = false;
            } else {
                password.classList.remove("invalid");
                passwordError.style.display = "none";
            }
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add("invalid");
                confirmPasswordError.style.display = "inline";
                isValid = false;
            } else {
                confirmPassword.classList.remove("invalid");
                confirmPasswordError.style.display = "none";
            }
            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });

        document.getElementById("ta_password").addEventListener("input", function() {
        const password = document.getElementById("ta_password");
        const passwordError = document.getElementById("passwordError");
        if (password.value.length < 8) {
                password.classList.add("invalid");
                passwordError.style.display = "inline";
                isValid = false;
            } else {
                password.classList.remove("invalid");
                passwordError.style.display = "none";
            }
    });

    document.getElementById("confirm_password").addEventListener("input", function() {
        const password = document.getElementById("ta_password");
            const passwordError = document.getElementById("passwordError");
            const confirmPassword = document.getElementById("confirm_password");
            const confirmPasswordError = document.getElementById("confirmPasswordError");
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add("invalid");
                confirmPasswordError.style.display = "inline";
                isValid = false;
            } else {
                confirmPassword.classList.remove("invalid");
                confirmPasswordError.style.display = "none";
            }
    });
        </script>
    </body>
</html>
