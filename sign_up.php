<?php
  echo "<!DOCTYPE html>
  <head>
    <title>Signing Up ...</title>
  </head>
  <body>
  </body>
  </html>";


  $servername = 'localhost';
  $dbuser = 'postgres';
  $dbpass = 'Vicks1428';
  $db = 'intercityexpress';

// Create connection
  $sign_up_conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

  $p_name = $_POST["p_name"];
  $p_address = $_POST["p_address"];
  $p_state = $_POST["p_state"];
  $p_district = $_POST["p_district"];
  $p_pincode = $_POST["p_pincode"];
  $p_dob = $_POST["p_dob"];
  $p_mobile = $_POST["p_mobile"];
  $p_email = $_POST["p_email"];
  $p_gender = $_POST["p_gender"];
  $p_username = $_POST["p_username"];
  $p_password = $_POST["p_password"];
  $p_secq = $_POST["p_secq"];
  $p_seca = $_POST["p_seca"];

  $sign_up_query = "insert into passenger(name,address,state,district,pincode,date_of_birth,mobile_no,email_id,gender,username,password,sec_ques,sec_ans) values('$p_name','$p_address','$p_state','$p_district','$p_pincode','$p_dob','$p_mobile','$p_email','$p_gender','$p_username','$p_password','$p_secq','$p_seca');";

  $sign_up_execute = pg_query($sign_up_conn,$sign_up_query);

  if($sign_up_execute){
    echo '<script>window.alert("You are successfully Registered !!!"); window.location.href="passenger_login.html"</script>';
  }
  else{
    echo '<script>window.alert("Got some technical Failure !!!"); window.location.href="sign_up.html"</script>';
  }
?>

