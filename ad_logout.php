<?php
    echo "<html><head><title>Logging Out</title></head><html>";
    session_start();
    session_destroy();
    session_abort();
    echo "<script>window.alert('Logged Out Successfully !!!');window.location.href='admin_login.html'</script>"
?>