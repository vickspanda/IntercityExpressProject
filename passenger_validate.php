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
  $conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

  //Validation of the Username and Password;
  $pass_username = $_POST["pass_username"];
  $pass_password = $_POST["pass_password"];
  

  $validate_username = "select username from passenger where username='$pass_username';";
  $user_query = pg_query($conn,$validate_username);
  $pass_username_db = pg_fetch_row($user_query);

  if($pass_username_db[0]!= $pass_username)
  {
    echo '<script>window.alert("Entered username not found !!!"); window.location.href="passenger_login.html"</script>';
  }

  $get_pass_pass = "SELECT password from passenger where username='$pass_username';";
  $pass_query = pg_query($conn,$get_pass_pass);
  $pass_password_db = pg_fetch_row($pass_query);
  

  if($pass_password_db[0]==$pass_password){
    session_start();
    $_SESSION['pass_username']=$pass_username;
    echo '<script>window.alert("Logged In Successfully !!!"); window.location.href="passenger_dashboard.php"</script>';
    
  }
  else{
    echo '<script>window.alert("You have entered wrong password !!!"); window.location.href="passenger_login.html"</script>';   
  }
?>

