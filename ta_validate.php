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
  $ta_username = $_POST["ta_username"];
  $ta_password = $_POST["ta_password"];
  

  $validate_username = "select username from admin where username='$ta_username';";
  $user_query = pg_query($conn,$validate_username);
  $ta_username_db = pg_fetch_row($user_query);

  if($ta_username_db[0]!= $ta_username)
  {
    echo '<script>window.alert("Entered admin not found !!!"); window.location.href="ta_login.html"</script>';
  }

  $get_ta_pass = "SELECT password from admin where username='$ta_username';";
  $pass_query = pg_query($conn,$get_ta_pass);
  $ta_password_db = pg_fetch_row($pass_query);
  

  if($ta_password_db[0]==$ta_password){
    echo "Correct Password";
    header('location: home.html');
    
  }
  else{
    echo '<script>window.alert("You have entered wrong password !!!"); window.location.href="ta_login.html"</script>';   
  }
?>