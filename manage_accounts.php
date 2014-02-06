<?php
  include('connect_db.php');
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
  }
  else
  { 
    if($_SESSION['type']!='admin'){
      header('Location:error.php');   
    }

?>


  <!DOCTYPE HTML>
  <html>
  <head>
      <meta charset="utf-8"/>
      <title>Your Profile</title>
      <link type="text/css" href="menu.css" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" href="style.css"/ >
      <link type="text/css" rel="stylesheet" href="admin_profile.css"/ >

      <script src="jquery.js"></script>
      <script type="text/javascript" src="menu.js"></script>
  </head>
  <body>
    <?php include('header.php'); ?>
    <div id="profile_wrap">
    	<div id="profile">
			
				
				<a id="add" href="add_accounts.php" > Add accounts </a>
				
				
				<a id="con" href="convert_accounts.php" > Convert accounts </a>
				
				
			
    </div>
  </body>
  </html>

  <?php } ?>