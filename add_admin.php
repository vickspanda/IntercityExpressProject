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
$ad_conn = pg_connect("host=$servername dbname=$dbname user=$dbuser password=$dbpass");
if (!$ad_conn) {
    die("Connection failed: " . pg_last_error());
}

$uid = 'ad_02';
$name = 'Vikas Sharma';
$ad_username = 'vicks1428' ;
$ad_password = 'Vick$1428';


// Sanitize inputs if needed (not shown here, but recommended)
$ad_hashed_password = password_hash($ad_password,PASSWORD_DEFAULT);

// Query to validate the username
$add_admin = "insert into admin values($1,$2,$3,$4);";
$admin_params = array($uid,$name,$ad_username,$ad_hashed_password);
$add_admin_execute = pg_query_params($ad_conn, $add_admin, $admin_params);

if (!$add_admin_execute) {
    die("Error in SQL query: " . pg_last_error());
}
else
{
    echo "Successfully Registered";
}
// Close database connection
pg_close($ad_conn);
?>
