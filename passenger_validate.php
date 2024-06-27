<?php
session_start();

echo "<!DOCTYPE html>
<html>
<head>
  <title>Authenticating ...</title>
</head>
<body>
</body>
</html>";

$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vick$1428';
$db = 'intercityexpress';

// Create connection
$conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$pass_username = $_POST["pass_username"] ?? '';
$pass_password = $_POST["pass_password"] ?? '';

if (!$pass_username || !$pass_password) {
    echo '<script>window.alert("Login to the System First !!!"); window.location.href="passenger_login.html";</script>';
    exit();
}

$validate_username_query = "SELECT username, password FROM passenger WHERE username = $1";
$result = pg_query_params($conn, $validate_username_query, array($pass_username));

if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    $pass_password_db = $row['password'];

    if (password_verify($pass_password, $pass_password_db)) {
        $_SESSION['pass_username'] = $pass_username;
        echo '<script>window.alert("Logged In Successfully !!!"); window.location.href="passenger_dashboard.php";</script>';
    } else {
        echo '<script>window.alert("You have entered wrong password!!!"); window.location.href="passenger_login.html";</script>';
    }
} else {
    echo '<script>window.alert("Entered username not found !!!"); window.location.href="passenger_login.html";</script>';
}


pg_close($conn);
?>
