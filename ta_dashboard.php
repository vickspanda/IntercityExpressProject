<?php
session_start();
$ta_username = $_SESSION["ta_username"] ?? '';

if (!$ta_username) {
    echo '<script>window.alert("Login to the System First !!!"); window.location.href="ta_login.html";</script>';
    exit();
}

$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vick$1428';
$db = 'intercityexpress';

$conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$get_ta_name_query = "SELECT ta_name FROM travel_agent WHERE username = $1";
$ta_name_result = pg_query_params($conn, $get_ta_name_query, array($ta_username));

if ($ta_name_result && pg_num_rows($ta_name_result) > 0) {
    $ta_name_row = pg_fetch_row($ta_name_result);
    $ta_name = $ta_name_row[0];
} else {
    echo '<script>window.alert("Error retrieving user information."); window.location.href="ta_login.html";</script>';
    exit();
}

pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ta_account.css">
    <title>Dashboard</title>
    <script>
        function logout() {
            var res = window.confirm("Do You Want To Log Out ???");
            if (res === true) {
                window.location.href = "ta_logout.php";
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
                        <li><a href="ta_view_profile.php">YOUR PROFILE</a></li>
                        <li><a href="#" onclick="logout()">LOG OUT</a></li>
                    </ul>
                </div>
            </div>
            <div class="col2">
                <div class="welcome">
                    Welcome <?php echo htmlspecialchars($ta_name); ?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
