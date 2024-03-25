<?php
//Starting Session
session_start();
$pass_username = $_SESSION["pass_username"];

//Connecting to Database
$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vicks1428';
$db = 'intercityexpress';
$conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

//Query for retrieving name
$get_pass_name = "select name from passenger where username='$pass_username';";
$pass_name_query = pg_query($conn,$get_pass_name);
$pass_name_result = pg_fetch_row($pass_name_query);

//Query for retrieving address
$get_pass_address = "select address from passenger where username='$pass_username';";
$pass_address_query = pg_query($conn,$get_pass_address);
$pass_address_result = pg_fetch_row($pass_address_query);

//Query for retrieving district
$get_pass_district = "select district from passenger where username='$pass_username';";
$pass_district_query = pg_query($conn,$get_pass_district);
$pass_district_result = pg_fetch_row($pass_district_query);

//Query for retrieving state
$get_pass_state = "select state from passenger where username='$pass_username';";
$pass_state_query = pg_query($conn,$get_pass_state);
$pass_state_result = pg_fetch_row($pass_state_query);

//Query for retrieving pincode
$get_pass_pincode = "select pincode from passenger where username='$pass_username';";
$pass_pincode_query = pg_query($conn,$get_pass_pincode);
$pass_pincode_result = pg_fetch_row($pass_pincode_query);

//Query for retrieving mobile_no
$get_pass_mobile_no = "select mobile_no from passenger where username='$pass_username';";
$pass_mobile_no_query = pg_query($conn,$get_pass_mobile_no);
$pass_mobile_no_result = pg_fetch_row($pass_mobile_no_query);

//Query for retrieving email_id
$get_pass_email_id = "select email_id from passenger where username='$pass_username';";
$pass_email_id_query = pg_query($conn,$get_pass_email_id);
$pass_email_id_result = pg_fetch_row($pass_email_id_query);

//Query for retrieving DOB
$get_pass_dob = "select date_of_birth from passenger where username='$pass_username';";
$pass_dob_query = pg_query($conn,$get_pass_dob);
$pass_dob_result = pg_fetch_row($pass_dob_query);

//Query for retrieving Age
$get_pass_age = "select AGE(date_of_birth) from passenger where username='$pass_username';";
$pass_age_query = pg_query($conn,$get_pass_age);
$pass_age_result = pg_fetch_row($pass_age_query);

//Query for retrieving Age
$get_pass_gender = "select gender from passenger where username='$pass_username';";
$pass_gender_query = pg_query($conn,$get_pass_gender);
$pass_gender_result = pg_fetch_row($pass_gender_query);
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
function logout(){
	var res = window.confirm("Do You Want To Log Out ???");
	if(res==true)
	{
		window.location.href="pass_logout.php";
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
						<?php echo $pass_name_result[0];?><br><br>
						<?php echo $pass_dob_result[0];?><br><br>
						<?php echo $pass_age_result[0];?><br><br>
						<?php echo $pass_gender_result[0];?><br><br>
						<?php echo $pass_mobile_no_result[0];?><br><br>
						<?php echo $pass_email_id_result[0];?><br><br>
						<?php echo $pass_address_result[0];?>,<br> <?php echo $pass_district_result[0];?>, <?php echo $pass_state_result[0];?><br> <?php echo $pass_pincode_result[0];?>
	    				</div>
		</footer>
		<div class="signup">
            <br><br>
            <button onclick="location.href = '#'" type="button" >Update</button><br><br><br>
        </div>
	</div>
</body>
</html>
