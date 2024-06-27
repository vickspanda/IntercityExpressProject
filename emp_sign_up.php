<?php
echo "<!DOCTYPE html>
<html>
<head>
  <title>Signing Up ...</title>
</head>
<body>
</body>
</html>";

$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vick$1428';
$db = 'intercityexpress';

$conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$emp_name = $_POST["fullName"] ?? '';
$emp_res_address = $_POST["address"] ?? '';
$emp_res_state = $_POST["state"] ?? '';
$emp_res_district = $_POST["district"] ?? '';
$emp_res_pincode = $_POST["pinCode"] ?? '';
$emp_date_of_birth = $_POST["dob"] ?? '';
$emp_mobile_no = $_POST["mobile"] ?? '';
$emp_email_id = $_POST["email"] ?? '';
$emp_gender = $_POST["gender"] ?? '';
$emp_qual = $_POST["qualification"] ?? '';
$emp_date_of_joining = $_POST["doj"] ?? '';
$emp_gov_id = $_POST["govtId"] ?? '';
$emp_id = $_POST["idNumber"] ?? '';
$emp_des = $_POST["designation"] ?? '';
$emp_password = $_POST["password"] ?? '';

$counter_query = "SELECT counter FROM emp_username_generator ORDER BY emp_id DESC LIMIT 1";
$counter_result = pg_query($conn, $counter_query);

if($counter_result){
    $row = pg_fetch_assoc($counter_result);
    $counter = $row['counter'];

    $newCounter = $counter + 1;
    $updateCounter = "INSERT INTO emp_username_generator (counter) VALUES ($newCounter)";
    $newResult = pg_query($conn, $updateCounter);

    if($newResult){
        $emp_username = 'EMP' . $counter;
    } else {
        die("Error updating counter: " . pg_last_error($conn));
    }
} else {
    die("Error fetching counter: " . pg_last_error($conn));
}

$emp_hashed_password = password_hash($emp_password, PASSWORD_DEFAULT);

$emp_reg_query = "INSERT INTO employee (emp_name, emp_res_address, emp_res_state, emp_res_district, emp_res_pincode, emp_date_of_birth, emp_mobile_no, emp_email_id, emp_gender, emp_qual, emp_date_of_joining, emp_gov_id, emp_id, emp_des, username, password) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16)";
$emp_reg_params = array($emp_name, $emp_res_address, $emp_res_state, $emp_res_district, $emp_res_pincode, $emp_date_of_birth, $emp_mobile_no, $emp_email_id, $emp_gender, $emp_qual, $emp_date_of_joining, $emp_gov_id, $emp_id, $emp_des, $emp_username, $emp_hashed_password);
$emp_reg_execute = pg_query_params($conn, $emp_reg_query, $emp_reg_params);

if ($emp_reg_execute) {
    echo '<script>window.alert("Employee has been added Successfully with username = '.$emp_username.'!!!"); window.location.href="emp_reg.php";</script>';
} else {
    $rev_query = "DELETE FROM emp_username_generator WHERE counter = $newCounter";
    echo '<script>window.alert("Got some technical Failure!!!"); window.location.href="emp_reg.php";</script>';
    echo "Error: " . pg_last_error($conn);
}

pg_close($conn);
?>
