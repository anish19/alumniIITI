<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Alumni IITI</title>
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="style.css"/ >
    <link type="text/css" rel="stylesheet" href="edit_profile.css"/ >


    <script src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>

</head>
<body>
 <?php include('header.php'); ?>
<div class="wrap_400">

<?php 


if(isset($_GET['submit']))
{	
	$to='alumniiiti@gmail.com';
	$subject='This is an email requesting permission to become an alumni of IIT Indore';
	$body='Roll no.:'.$_GET['rollno']."\n".'Year of Passing :'.$_GET['year']."\n".'Date of Birth :'.$_GET['dob']."\n" ;
	$header='From: '.$_GET['email'].' ';

	if(mail($to,$subject,$body,$header)){
		echo 'Your registration details have been received. <br>You will receive a link to a registration form as soon as your details are verified. <br/>The process may take 1 to 2 days';
  	}
	else{
		echo 'Error in sending email';
	}
}
else
{
?>


  <h1 style="margin-left:20px;">Register</h1>
  <p style="margin-left:20px;">Please fill in the registration details to become an alum of IIT Indore.</p>
  
  <form action="register.php" method="GET" style="margin-left:20px;">
  Roll No. <br><input id="rollno" name="rollno" type="text"><br><br>
  Year of Passing<br>
 <select name="year">
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select><br><br>
  Date of Birth <br><input id="dob" name="dob" type="text"><br><br>
  Email Id <br><input id="email" name="email" type="text"><br><br>
  <p class="submit">
                <input type="submit" value="Submit"/>
              </p>
  </form>
  
  
  
  </div>
  </body>
  </html>
 <?php } ?> 
