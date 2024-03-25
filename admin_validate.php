<?php
  echo "<!DOCTYPE html>
  <head>
    <title>Authenticating ...</title>
  </head>
  <body>
    
  </body>
  </html>";

  $servername = 'localhost';
  $dbuser = 'postgres';
  $dbpass = 'Vicks1428';
  $db = 'intercityexpress';

// Create connection
  $ad_conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

  //Validation of the Username and Password;
  $ad_username = $_POST["ad_username"];
  $ad_password = $_POST["ad_password"];

  $validate_username = "select username from admin where username='$ad_username';";
  $user_query = pg_query($ad_conn,$validate_username);
  $ad_username_db = pg_fetch_row($user_query);

  if($ad_username_db[0]!= $ad_username)
  {
    echo '<script>window.alert("Entered admin not found !!!"); window.location.href="admin_login.html"</script>';
  }

  $get_admin_pass = "SELECT password from admin where username='$ad_username';";
  $pass_query = pg_query($ad_conn,$get_admin_pass);
  $ad_password_db = pg_fetch_row($pass_query);
  

  if($ad_password_db[0]==$ad_password){
    session_start();
    $_SESSION["admin_username"] = $ad_username;
    echo '<script>window.alert("Logged In Successfully !!!"); window.location.href="admin_dashboard.php"</script>';
    
  }
  else{
    echo '<script>window.alert("You have entered wrong password !!!"); window.location.href="admin_login.html"</script>';   
  }
?>
