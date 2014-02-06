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
  if((!isset($_POST['passing_year'])) )
		{
?>
	<html>
		<body>
			<div id="profile_wrap">
			<?php	if($flag=isset($_GET['flag'])) if( $flag==1)	echo 'accounts converted sucessfully </br>' ;	?>
			<span id="con_text">Convert the students from the following year to alumni</span>
			<br>
			</br>
				<form action="convert_accounts.php" method="POST">
					Year of passing
					<input name="passing_year" placeholder="e.g.  2015" required>
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
		$passing_year = $_POST['passing_year'];
		$info = "SELECT `username`,`password` FROM `student` WHERE `passing_year`='$passing_year'";	
		$info_run=mysql_query($info) or die('dead');
		$info_row=mysql_num_rows($info_run);
		$i=1;
		while($temp1=mysql_fetch_assoc($info_run))
		{
			$info_list[$i]=$temp1;
			$i++;
		}

		
		$i=1;
		
		while($info_row)
		{
		$insert_info = "INSERT INTO `alumni` (`username`, `password`) VALUES ('".mysql_real_escape_string($info_list[$i]['username'])."' , '".mysql_real_escape_string($info_list[$i]['password'])."' )";
		$delete_info = "DELETE FROM `student` where `passing_year`='$passing_year'";
		mysql_query($insert_info) or die('unable to insert ');
		mysql_query($delete_info) or die('unable to delete');
		$info_row--;
		$i++;
		}
		$flag=1;
		header('Location:convert_accounts.php?flag=1');
	}
}
}
?>