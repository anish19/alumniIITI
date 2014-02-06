<?php
   session_start();
   if(isset($_SESSION['id']))
   { 
       if($_SESSION['type']=='alumni')
       {
           header('Location:alum_profile.php');
       }
       else 
        {
          if($_SESSION['type']=='student')
          {
             header('Location:student_profile.php');
          }
          else
          {
             header('Location:admin_profile.php'); 
          }
        }
   }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Alumni IITI</title>
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="style.css"/ >
    <link type="text/css" rel="stylesheet" href="login.css"/ >

    <script src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>

</head>
<body> <!--style="background-color:#f4f4f2"-->

  <?php include('header.php'); ?>
  
  <div id="login_wrap">
  	<h1>Login</h1>
  	<p>Please enter your username and password to access members-only features.</p>
  	<div id="login">
  	<form action="userdetect.php" method="POST">
  		<fieldset id="inputs">
  			Username<br/><input id="username" type="text" name="username" placeholder="Username" required><br/><br/>   
        	Password<br/><input id="password" type="password" name="password" placeholder="Password" required><br/>
        </fieldset>
        <fieldset id="actions"> 
        	<input type="submit" id="submit" value="Log In">
        </fieldset>	
  	</form>
  	</div>
  </div>


</body>
</html>
