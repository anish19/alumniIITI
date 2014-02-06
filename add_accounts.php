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
	else{
?>

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
			</body>
	</html>
		
<?php
  if((!isset($_POST['type'])) && (!isset($_POST['username'])) && (!isset($_POST['password'])))
		{
	  		?>
			<html>
			<body>
			<div class="wrap_400">
    
			<form action="add_accounts.php" method="POST">
				Type
				<select name="type">
					
					<option value="alumni">Alumni</option>
					<option value="student">Student</option>
					<option value="student">Faculty</option>
					<option value="admin">Admin</option>
					
				</select>
				<br/><br/>
				Username
				<input name="username" required>
				</input>
				<br/><br/>
				
				Password
				<input id="password" type="password" name="password" placeholder="Password" required><br/>
				</input>
		
				</br></br>
				
				<input type="submit" value="Submit">

			</form>
<div>
</body>
		  </html>

	<?php	
	}
	  else
	  {
	  	  $type = $_POST['type'];
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  $password_hash= md5($password);
			if($type == "alumni")
			{
				$query_match = "SELECT `username` FROM `alumni` WHERE `username`='$username'";
				$query_match_run = mysql_query($query_match) OR DIE ('queryer');
			?>
			<div class="wrap_400">
			<div>
			
			<?php
				if(mysql_num_rows($query_match_run)==1){
					echo 'The username '.$username.' already exists.';}
				else
					{$query_insert = "INSERT INTO `alumni` (`username`, `password`) VALUES ('".mysql_real_escape_string($username)."' , '".mysql_real_escape_string($password_hash)."' )";
					mysql_query($query_insert) or die('could not insert');}
			}
				
			else
			{
				$query_match = "SELECT `username` FROM `student` WHERE `username`='$username'";
				$query_match_run = mysql_query($query_match);
				
				if(mysql_num_rows($query_match_run)==1)
				{echo 'The username '.$username.' already exists.';}
				else
				{$query_insert = "INSERT INTO `student` (`username`, `password`) VALUES ('".mysql_real_escape_string($username)."' , '".mysql_real_escape_string($password_hash)."' )";
				mysql_query($query_insert) or die('could not insert');}
			}
			if(mysql_num_rows($query_match_run)==0 )
				{echo 'account added for '.$username;}
			else{
				echo 'could not register';}
		}
	  }}
 ?>
      


