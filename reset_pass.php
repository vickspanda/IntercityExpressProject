<?php
    session_start();
    $pass_username = $_SESSION["reset_username"];
?>


<!DOCTYPE html>
    <head>
        <title>Reset Password</title>
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
            <form method="post" action="update_pass.php">
                <br><br>
                <div class="lbl2">
                    <label>Reset Password</label><br><br><br>
                </div>
                <div class="credentials_forgot">
                    <input type="username" name="pass_username" placeholder="<?php echo $pass_username;?>" required readonly>
                    <br><br><br>
                    <input type="password" name="pass_password" placeholder="New Password" required>
                    <br><br><br>
                    <input type="password" placeholder="Confirm Password" required>
                    <br><br><br>
                </div>
                <div class="submit2">
                    <input type="submit" value="Update">
                    <br><br><br>
                </div>
        </div>
    </body>
</html>
