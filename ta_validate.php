<?php
echo "<!DOCTYPE html>
<head>
    <title>Authenticating ...</title>
</head>
<body>
</body>
</html>";

// Database connection parameters
$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vick$1428';
$dbname = 'intercityexpress';

// Establish connection
$ta_conn = pg_connect("host=$servername dbname=$dbname user=$dbuser password=$dbpass");
if (!$ta_conn) {
    die("Connection failed: " . pg_last_error());
}

// Validate username and password from form submission
$ta_username = $_POST["ta_username"] ?? '';
$ta_password = $_POST["ta_password"] ?? '';

if (!$ta_username || !$ta_password) {
    echo '<script>window.alert("Login to the System First !!!"); window.location.href="ta_login.html";</script>';
    exit;
}

// Sanitize inputs if needed (not shown here, but recommended)
$ta_username = pg_escape_string($ta_conn, $ta_username);
$ta_password = pg_escape_string($ta_conn, $ta_password);

// Query to validate the username
$validate_username = "SELECT username, password, status FROM travel_agent WHERE username='$ta_username'";
$user_query = pg_query($ta_conn, $validate_username);

if (!$user_query) {
    die("Error in SQL query: " . pg_last_error());
}

$ta_row = pg_fetch_assoc($user_query);

// Check if username exists
if (!$ta_row) {
    echo '<script>window.alert("Entered username not found !!!"); window.location.href="ta_login.html";</script>';
    exit;
}

// Verify the password
$hashed_password = $ta_row['password'];
if (password_verify($ta_password, $hashed_password)) {
    $status_db = $ta_row['status'];
    session_start();
    $_SESSION["ta_username"] = $ta_username;
    if ($status_db === 'Unverified') {
        echo '<script>window.alert("Logged In Successfully !!!"); window.location.href="ta_alert.php";</script>';
    } else {
        echo '<script>window.alert("Logged In Successfully !!!"); window.location.href="ta_dashboard.php";</script>';
    }
} else {
    echo '<script>window.alert("You have entered wrong password !!!"); window.location.href="ta_login.html";</script>';
}

// Close database connection
pg_close($ta_conn);
?>
