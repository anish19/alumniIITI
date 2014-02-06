<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
include ('connect_db.php');
session_start();
if(!isset($_SESSION['id']))
{
	header('Location:login.php');
}


 ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Contact Alumni</title>
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
if(isset($_POST['submit']))
{ 
    $query_row=mysql_query("SELECT email FROM `alumni` WHERE id='$id'") or die("cannot recieve id");
    $receiver = mysql_fetch_assoc($query_row);
	$to=$receiver['email'];
	$subject='IIT Indore alumni affairs : contact request'; 
	$body=$_POST['message'];
	$header='From :'.$_POST['email'];
	
	if(mail($to,$subject,$body,$header)){
		echo 'Your request has been sent';
  	}
	else{
		echo 'Error in sending email';
	}
}	
	

else
{
	
?>
<form action="contact.php?id=<?php echo $id; ?>" method="POST">
Message
<br><textarea rows="4" cols="50" name="message" id="message" placeholder="Type your message here" >
 
 </textarea><br>
 <br>
Your Email Id <br><input type="text" name="email" id="email" required /><br>
              <p class="submit">
                <input type="submit" value="Save Profile"/>
              </p>
</form>


<?php } 
	
?>