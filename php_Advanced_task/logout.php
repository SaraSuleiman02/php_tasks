<?php
if (!session_start()){
    session_start();
}
session_destroy();
header('Location: index.php'); // Redirect to the login page
exit;
?>