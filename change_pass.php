<?php
    session_start();
    $pass_username = $_SESSION["pass_username"];
    if(!$pass_username)  {
        echo '<script>window.alert("Login to the System First !!!"); window.location.href="passenger_login.html"</script>';
      }

    $_SESSION["reset_username"] = $pass_username;
?>


<!DOCTYPE html>
    <head>
        <title>Change Password</title>
        <style>
        .error {
            color: white;
            display: none;
        }
        .invalid {
            border-color: red;
        }
    </style>
        <link rel="stylesheet" href="change_pass.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <div class="background"></div>
        <div class="login_form">
            <form id="signUpForm" method="post" action="change_pass_update.php">
                <br><br>
                <div class="lbl2">
                    <label>Change Password</label><br><br><br>
                </div>
                <div class="credentials_forgot">
                    <input type="username" name="pass_username" placeholder="<?php echo $pass_username;?>" required readonly>
                    <br><br><br>
                    <input type="password" name="pass_password" placeholder="New Password" id="pass_password" required>
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
            const password = document.getElementById("pass_password");
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

        document.getElementById("pass_password").addEventListener("input", function() {
        const password = document.getElementById("pass_password");
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
        const password = document.getElementById("pass_password");
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
