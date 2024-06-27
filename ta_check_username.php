<?php
// Assuming you have already established a PostgreSQL connection
// Replace these variables with your actual database credentials
$host = 'localhost';
$dbname = 'intercityexpress';
$username = 'postgres';
$password = 'Vick$1428';

// Establish a database connection
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Function to check if the username exists
function isUsernameTaken($pdo, $username) {
    $query = "SELECT COUNT(*) FROM travel_agent WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username]);
    $count = $stmt->fetchColumn();
    return $count > 0;
}

// Check if username is provided in the POST request
if (isset($_POST['ta_username'])) {
    $username = $_POST['ta_username'];

    // Check if the username is taken
    if (isUsernameTaken($pdo, $username)) {
        echo "Username is already taken";
    }
}
?>
