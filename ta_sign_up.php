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


$ta_conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

if (!$ta_conn) {
    die("Connection failed: " . pg_last_error());
}

$ta_res_address = $_POST["ta_res_address"] ?? '';
$ta_name = $_POST["ta_name"] ?? '';
$ta_res_state = $_POST["ta_res_state"] ?? '';
$ta_res_district = $_POST["ta_res_district"] ?? '';
$ta_res_pincode = $_POST["ta_res_pincode"] ?? '';
$ta_date_of_birth = $_POST["ta_date_of_birth"] ?? '';
$ta_mobile_no = $_POST["ta_mobile_no"] ?? '';
$ta_email_id = $_POST["ta_email_id"] ?? '';
$ta_gender = $_POST["gender"] ?? '';
$ta_com_address = $_POST["ta_com_address"] ?? '';
$ta_com_state = $_POST["ta_com_state"] ?? '';
$ta_com_district = $_POST["ta_com_district"] ?? '';
$ta_com_pincode= $_POST["ta_com_pincode"] ?? '';
$ta_gov_id = $_POST["ta_gov_id"] ?? '' ;
$ta_id = $_POST["ta_id"] ?? '' ;
$ta_username = $_POST["ta_username"] ?? '';
$ta_password = $_POST["ta_password"] ?? '';
$ta_status = 'Unverified';


$ta_hashed_password = password_hash($ta_password, PASSWORD_DEFAULT);

$ta_reg_query = "INSERT INTO travel_agent (ta_name,ta_res_address, ta_res_state,ta_res_district,ta_res_pincode,ta_date_of_birth,ta_mobile_no,ta_email_id,ta_gender,ta_com_address,ta_com_state,ta_com_district,ta_com_pincode,ta_gov_id,ta_id,username,password,status) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18)";
$ta_reg_params = array($ta_name, $ta_res_address, $ta_res_state, $ta_res_district, $ta_res_pincode, $ta_date_of_birth, $ta_mobile_no, $ta_email_id, $ta_gender, $ta_com_address, $ta_com_state, $ta_com_district, $ta_com_pincode, $ta_gov_id, $ta_id, $ta_username, $ta_hashed_password, $ta_status);
$ta_reg_execute = pg_query_params($ta_conn, $ta_reg_query, $ta_reg_params);

if ($ta_reg_execute) {
    echo '<script>window.alert("Your Application is Successfully Submitted !!!"); window.location.href="ta_login.html";</script>';
} else {
    echo '<script>window.alert("Got some technical Failure !!!"); window.location.href="ta_reg.html";</script>';
    echo "Error: " . pg_last_error($ta_conn);
}

pg_close($ta_conn);
?>
