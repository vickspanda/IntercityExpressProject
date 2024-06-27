<?php
session_start();
$pass_username = $_SESSION["pass_username"] ?? '';

if (!$pass_username) {
    echo '<script>window.alert("Login to the System First !!!"); window.location.href="passenger_login.html";</script>';
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

function get_passenger_data($conn, $pass_username, $field) {
    $query = "SELECT $field FROM passenger WHERE username = $1";
    $result = pg_query_params($conn, $query, array($pass_username));
    if ($result && pg_num_rows($result) > 0) {
        return pg_fetch_result($result, 0, 0);
    } else {
        return null;
    }
}

$pass_name = get_passenger_data($conn, $pass_username, 'name');
$pass_address = get_passenger_data($conn, $pass_username, 'address');
$pass_district = get_passenger_data($conn, $pass_username, 'district');
$pass_state = get_passenger_data($conn, $pass_username, 'state');
$pass_pincode = get_passenger_data($conn, $pass_username, 'pincode');
$pass_mobile_no = get_passenger_data($conn, $pass_username, 'mobile_no');
$pass_email_id = get_passenger_data($conn, $pass_username, 'email_id');
$pass_dob = get_passenger_data($conn, $pass_username, 'date_of_birth');
$pass_age_query = pg_query_params($conn, "SELECT AGE(date_of_birth) FROM passenger WHERE username = $1", array($pass_username));
$pass_age = pg_fetch_result($pass_age_query, 0, 0);
$pass_gender = get_passenger_data($conn, $pass_username, 'gender');

pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pass_account.css">
    <link rel="stylesheet" href="pass_ppv.css">
    <title>Dashboard</title>
    <script>
        function logout() {
            var res = window.confirm("Do You Want To Log Out ???");
            if (res === true) {
                window.location.href = "pass_logout.php";
            }
        }
    </script>
</head>
<body>
    <div class="bg_pass_account"></div>
    <div class="pass_account_ppv">
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
            <div class="col2_ppv">
                Name <br><br>
                Date of Birth <br><br>
                Age <br><br>
                Gender <br><br>
                Mobile No. <br><br>
                Email Id <br><br>
                Address 
            </div>
            <div class="col3_ppv">
                <?php echo htmlspecialchars($pass_name); ?><br><br>
                <?php echo htmlspecialchars($pass_dob); ?><br><br>
                <?php echo htmlspecialchars($pass_age); ?><br><br>
                <?php echo htmlspecialchars($pass_gender); ?><br><br>
                <?php echo htmlspecialchars($pass_mobile_no); ?><br><br>
                <?php echo htmlspecialchars($pass_email_id); ?><br><br>
                <?php echo htmlspecialchars($pass_address); ?>,<br> <?php echo htmlspecialchars($pass_district); ?>, <?php echo htmlspecialchars($pass_state); ?><br> <?php echo htmlspecialchars($pass_pincode); ?>
            </div>
        </footer>
        <div class="signup">
            <br><br>
            <button onclick="location.href='#'" type="button" id="signup1">Update</button>
            <button onclick="location.href='change_pass.php'" type="button" id="signup2">Change Password</button><br><br><br>
        </div>
    </div>
</body>
</html>
