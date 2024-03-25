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
  $pass_secq = $_POST["pass_secq"];
  $pass_seca = $_POST["pass_seca"];
  
  $validate_username = "select username from passenger where username='$pass_username';";
  $user_query = pg_query($conn,$validate_username);
  $pass_username_db = pg_fetch_row($user_query);

  if($pass_username_db[0]!= $pass_username)
  {
    echo '<script>window.alert("Entered username not found !!!"); window.location.href="forgot_pass.html"</script>';
  }

  $validate_secq = "select sec_ques from passenger where username='$pass_username';";
  $secq_query = pg_query($conn,$validate_secq);
  $pass_secq_db = pg_fetch_row($secq_query);

  if($pass_secq_db[0]!= $pass_secq)
  {
    echo '<script>window.alert("Security Question not matched with the given username !!!"); window.location.href="forgot_pass.html"</script>';
  }

  $get_pass_seca = "SELECT sec_ans from passenger where username='$pass_username';";
  $seca_query = pg_query($conn,$get_pass_seca);
  $pass_seca_db = pg_fetch_row($seca_query);
  
  if($pass_seca_db[0]==$pass_seca){
    session_start();
    $_SESSION["reset_username"] = $pass_username;
    echo '<script>window.alert("Validated Successfully !!!"); window.location.href="reset_pass.php  "</script>';
    
  }
  else{
    echo '<script>window.alert("You have entered wrong security answer !!!"); window.location.href="forgot_pass.html"</script>';   
  }
?>

