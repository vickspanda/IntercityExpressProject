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
  $dbpass = 'Vick$1428';
  $db = 'intercityexpress';

// Create connection
  $conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");

  //Validation of the Username and Password;
  $emp_username = $_POST["emp_username"];
  $emp_password = $_POST["emp_password"];
  if(!$emp_username)  {
    echo '<script>window.alert("Login to the System First !!!"); window.location.href="emp_login.html"</script>';
  }
  

  $validate_username = "select username from admin where username='$emp_username';";
  $user_query = pg_query($conn,$validate_username);
  $emp_username_db = pg_fetch_row($user_query);

  if($emp_username_db[0]!= $emp_username)
  {
    echo '<script>window.alert("Entered admin not found !!!"); window.location.href="emp_login.html"</script>';
  }

  $get_emp_pass = "SELECT password from admin where username='$emp_username';";
  $pass_query = pg_query($conn,$get_emp_pass);
  $emp_password_db = pg_fetch_row($pass_query);
  

  if($emp_password_db[0]==$emp_password){
    echo "Correct Password";
    header('location: home.html');
    
  }
  else{
    echo '<script>window.alert("You have entered wrong password !!!"); window.location.href="emp_login.html"</script>';   
  }
?>
