<?php
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Updating...</title>
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
    die('<script>window.alert("Connection failed: " . pg_last_error()); window.location.href="passenger_login.html"</script>');
}

// Start session
session_start();

$pass_username = $_SESSION["pass_username"];
$pass_password = $_POST["pass_password"];

// Check if the username is set in session
if (!$pass_username) {
    echo '<script>window.alert("Login to the system first!"); window.location.href="passenger_login.html"</script>';
    exit();
}

// Hash the password using password_hash
$pass_hashed_password = password_hash($pass_password, PASSWORD_DEFAULT);

// Update the password in the database
$update_pass_pass = "UPDATE passenger SET password='$pass_hashed_password' WHERE username='$pass_username';";
$pass_query = pg_query($conn, $update_pass_pass);

// Check if the query was successful
if ($pass_query) {
    echo '<script>window.alert("Password changed successfully!"); window.location.href="passenger_view_profile.php"</script>';
} else {
    echo '<script>window.alert("Got some technical issue!"); window.location.href="passenger_view_profile.php"</script>';
}

// Close the connection
pg_close($conn);
?>
