<?php

  echo "<!DOCTYPE html>
  <head>
    <title>Updating ...</title>
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
  session_start();
  $pass_username = $_SESSION["reset_username"];
  $pass_password = $_POST["pass_password"];
  

  $update_pass_pass = "update passenger set password='$pass_password' where username='$pass_username';";
  $pass_query = pg_query($conn,$update_pass_pass);
  session_destroy();
  session_abort();
  

  if($pass_query){
    echo '<script>window.alert("Password Changed Successfully !!!"); window.location.href="passenger_login.html"</script>';
    
  }
  else{
    echo '<script>window.alert("Got some technical issue !!!"); window.location.href="passenger_login.html"</script>';   
  }
?>

