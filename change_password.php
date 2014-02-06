<?php 
if(isset($_GET['flag'])){
		$flag=$_GET['flag']; 
	}
  include('connect_db.php');
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
  }
  else
  { 
    
?>
<!DOCTYPE HTML>
  <html>
  <head>
      <meta charset="utf-8"/>
      <title>Change Password</title>
      <link type="text/css" href="menu.css" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" href="style.css"/ >
      <link type="text/css" rel="stylesheet" href="profile.css"/ >
      <link type="text/css" rel="stylesheet" href="edit_profile.css"/ >


      <script src="jquery.js"></script>
      <script type="text/javascript" src="menu.js"></script>
  </head>
  <body>
  <?php include('header.php'); 
    
  
    $oldpassword=isset($_POST["oldpassword"])?$_POST["oldpassword"]:NULL;
    $oldpassword_hash=md5($oldpassword);
    $newpassword=isset($_POST["nw_password"])?$_POST["nw_password"]:NULL;
    $newpassword_hash=md5($newpassword);
    $confirmpassword=isset($_POST["con_nw_password"]) ?$_POST["con_nw_password"]:NULL;
    $confirmpassword_hash=md5($confirmpassword);
    if(isset($oldpassword)&&isset($newpassword)&&isset($confirmpassword))
    {
      if($_SESSION['type']=='alumni')
      {
          $query="SELECT * FROM `alumni` WHERE password='$oldpassword_hash' AND id='".$_SESSION['id']."' ";
          if($query_run=mysql_query($query) or die('cannot run query'))
          {
              $query_num_rows=mysql_num_rows($query_run);   /*gives no. of rows returned*/

              if($query_num_rows==0)
                header('Location:change_password.php?flag=1');
              
              else 
              {
                if($newpassword_hash == $confirmpassword_hash)
                {
    						  $query1="UPDATE `alumni` SET password='$confirmpassword_hash' WHERE password='$oldpassword_hash' ";
    						  $query_run_1=mysql_query($query1);
    						  header('Location:alum_profile.php?flag=3');
                }
    				   else
    					   header('Location:change_password.php?flag=2');
    				   


              }
          }
      }

      else if($_SESSION['type']=='student')
      {
          $query="SELECT * FROM `student` WHERE password='$oldpassword_hash' AND id='".$_SESSION['id']."' ";
          if($query_run=mysql_query($query) or die('cannot run query'))
          {
              $query_num_rows=mysql_num_rows($query_run);   /*gives no. of rows returned*/

              if($query_num_rows==0)
                header('Location:change_password.php?flag=1');
              
              else 
              {
                if($newpassword_hash == $confirmpassword_hash)
                {
                  $query1="UPDATE `student` SET password='$confirmpassword_hash' WHERE password='$oldpassword_hash' ";
                  $query_run_1=mysql_query($query1);
                  header('Location:student_profile.php?flag=3');
                }
               else
                 header('Location:change_password.php?flag=2');
               


              }
          }
      }
      
      else
      {
          $query="SELECT * FROM `admin` WHERE password='$oldpassword_hash' AND id='".$_SESSION['id']."' ";
          if($query_run=mysql_query($query) or die('cannot run query'))
          {
              $query_num_rows=mysql_num_rows($query_run);   /*gives no. of rows returned*/

              if($query_num_rows==0)
                header('Location:change_password.php?flag=1');
              
              else 
              {
                if($newpassword_hash == $confirmpassword_hash)
                {
                  $query1="UPDATE `admin` SET password='$confirmpassword_hash' WHERE password='$oldpassword_hash' ";
                  $query_run_1=mysql_query($query1);
                  header('Location:admin_profile.php?flag=3');
                }
               else
                 header('Location:change_password.php?flag=2');
               


              }
          }
      }     
    }	
?>
    <div class="wrap_400">
    
    <h1>Change Password</h1>
    <p>Enter your current password and new password you want to keep.
    
    <?php
    if(isset($_GET['flag']))
    {
			if($flag==1){
				echo'<br/>Invalid Current Password';
	        }
			else if($flag==2){
			    echo'<br/>New Password and Confirm New Password do not match';
			}
      else 
        NULL;
	  }
    
    ?>
    </p>
    
    <form action="change_password.php" method="POST"> 
     Current Password <br><input type="password" name="oldpassword" id="oldpassword"/><br>
     New Password<br><input type="password" id="nw_password" name="nw_password"/><br>
     Confirm New Password<br><input type="password"  id="con_nw_password" name="con_nw_password"/><br>
     <p class="submit">
                <input type="submit" value="Submit"/>
              </p>
            
    </form>
    
    
  
    
    </div>
    
	</body>
    </html>
 <?php } ?>