<?php
    session_start();
    $ta_username = $_SESSION["ta_username"];
    if(!$ta_username)  {
        echo '<script>window.alert("Login to the System First !!!"); window.location.href="ta_login.html"</script>';
      }

$servername = 'localhost';
$dbuser = 'postgres';
$dbpass = 'Vick$1428';
$db = 'intercityexpress';

$ta_conn = pg_connect("host=$servername dbname=$db user=$dbuser password=$dbpass");
if (!$ta_conn) {
    die("Connection failed: " . pg_last_error());
}

$get_ta_name_query = "SELECT ta_name FROM travel_agent WHERE username = $1";
$ta_name_result = pg_query_params($ta_conn, $get_ta_name_query, array($ta_username));

if ($ta_name_result && pg_num_rows($ta_name_result) > 0) {
    $ta_name_row = pg_fetch_row($ta_name_result);
    $ta_name = $ta_name_row[0];
}
?>


<!DOCTYPE html>
    <head>
        <title>Approval Pending</title>
        <link rel="stylesheet" href="ta_alert.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <div class="background"></div>
        <div class="login_form">
            <form id="signUpForm" method="post" action="ta_logout.php">
                <br><br>
                <div class="lbl2">
                    <label>You Are Not Verified !</label>
                </div>
                <div class="credentials_forgot">
                    <br>
                    <h2> Dear <?php echo htmlspecialchars($ta_name);?> ,</h2><h2>Your Registration is pending at the Administration Side for the Verification and Approval. You can Log into the System once your Registration is Verified and Approved by the Administration.</h2>
                    
                    <h2>Inconvenience is regretted !!!</h2>
                    <br>
                    
                </div>
                <div class="submit2">
                    <input type="submit" value="Okay">
                    <br><br><br>
                </div>
            </form>
        </div>
    </body>
</html>


<?php
    pg_close($ta_conn);
?>