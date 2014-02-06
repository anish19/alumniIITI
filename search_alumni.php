<?php
	 $thisPage="search_alumni";
	if(isset($_GET['flag'])){
		$flag=$_GET['flag']; 
	}
    include('connect_db.php');
    session_start(); 

    if(!isset($_SESSION['id'])){
    	$_SESSION['url'] = "search_alumni.php";
    	header('Location:login.php');
  	}
  	else
  	{
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Search Alum</title>
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link type="text/css" rel="stylesheet" href="search_alumni.css"/>
    <link type="text/css" rel="stylesheet" href="edit_profile.css"/ >

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
</head>
<body> <!--style="background-color:#f4f4f2"-->

<?php include('header.php'); ?>
<div class="wrap_400">
	<h1>Search Alumni</h1>
	
	<p>Please fill in the details to search for an alumni.
	
	<?php 
		if(isset($_GET['flag'])){
			if($flag==2)
				echo'<br/>No results were found.';
		  	else
		  		if($flag==1)
		  			echo'<br/>Please select at least 1 field.';
		}
	?>
	</P>

	
   <form action="alumni_list.php" method="GET">
   		Year of passing
   		<select name="year">
   			<option value="none">Not Sure</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select>
		<br/><br/>
		Type of Degree
		<select name="degree">
			<option value="none">Not Sure</option>
			<option value="btech">BTech</option>
			<option value="mtech">MTech</option>
			<option value="phd">Phd</option>
		</select>
		<br/><br/>
		Discipline
		<select name="discipline">
			<option value="none">Not Sure</option>
			<option value="cse">Computer Science and Engineering</option>
			<option value="ee">Electrical Engineering</option>
			<option value="me">Mechanical Engineering</option>
			<option value="chem">Chemistry</option>
		</select>
		<br/><br/>
		<p class="submit">
                <input type="submit" value="Search"/>
              </p>

    </form>


</div>
</body>
</html>

<?php } ?>