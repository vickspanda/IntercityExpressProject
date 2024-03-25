<?php
    session_start();
    $pass_username = $_SESSION["pass_username"];
    $servername = 'localhost';
    $dbuser = 'postgres';
    $dbpass = 'Vicks1428';
    $db = 'intercityexpress';
    $conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");
    $get_pass_name = "select name from passenger where username='$pass_username';";
    $pass_name_query = pg_query($conn,$get_pass_name);
    $pass_name_result = pg_fetch_row($pass_name_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pass_account.css">
    <title>Dashboard</title>
    <script>
        function logout(){
            var res = window.confirm("Do You Want To Log Out ???");
            if(res==true)
            {
                window.location.href="pass_logout.php";
            }
        }
    </script>
</head>
<body>
    <div class="bg_pass_account"></div>
    <div class="pass_account">
        <footer>
            <div class="col1">
                <div class="nav">
            <ul>
    <li><a href="#">PASSENGERS</a></li>
    <li><a href="ta_reg.php">TRAVEL AGENTS</a></li>
    <li><a href="emp_reg.php">EMPLOYEES</a></li>
    <li><a href="#">TRAINS</a></li>
    <li><a href="#">STATIONS</a></li>
    <li><a href="#">MAINTENANCE</a></li>
    <li><a href="passenger_view_profile.php">YOUR PROFILE</a></li>
    <li><a href="#" onclick="logout()">LOG OUT</a></li>
</ul>
</div>
            </div>
            <div class="col2">
                <div class="welcome">
                    Welcome <?php echo $pass_name_result[0];?>
                </div>
    </div>
</body>
</html>