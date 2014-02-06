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
    	<div  id="profile">
				<?php $query="SELECT firstname FROM `admin` WHERE id='".$_SESSION['id']."' ";

  				$query_run=mysql_query($query) or die('cannot execute query');

  				$query_num_rows=mysql_num_rows($query_run);

  					if($query_num_rows==1)
  							{	$query_row=mysql_fetch_assoc($query_run);
  								$name = $query_row['firstname'];
  							 } ?>
  				
				
				<p><span id="w">WELCOME!</span>
				
				
				<?php echo "<span id=\"a\">$name</span></p>"; ?>
				
				
				
				<a href="manage_accounts.php"> Manage accounts </a>
				</div>
    </div>
  </body>
  </html>

  <?php } ?>