<?php
 session_start();
 echo 'id of the logged in user is '.$_SESSION['id'].' '.$_SESSION['type'];
?>

<a href="logout.php">Log out</a>

 


