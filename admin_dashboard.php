<?php
    session_start();
    $ad_username = $_SESSION["admin_username"];
    $servername = 'localhost';
    $dbuser = 'postgres';
    $dbpass = 'Vicks1428';
    $db = 'intercityexpress';
    $conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");
    $get_admin_name = "select name from admin where username='$ad_username';";
    $admin_name_query = pg_query($conn,$get_admin_name);
    $admin_name_result = pg_fetch_row($admin_name_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_account.css">
    <title>Dashboard</title>
    <script>
        function logout(){
            var res = window.confirm("Do You Want To Log Out ???");
            if(res==true)
            {
                window.location.href="ad_logout.php";
            }
        }
    </script>
</head>
<body>
    <div class="bg_admin_account"></div>
    <div class="admin_account">
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
    <li><a href="#">YOUR PROFILE</a></li>
    <li><a href="#" onclick="logout()">LOG OUT</a></li>
</ul>
</div>
            </div>
            <div class="col2"><font></font>
                <div class="welcome">
                    Welcome <?php echo $admin_name_result[0];?>
                </div>
    </div>
</body>
</html>