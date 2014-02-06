<?php 
  include('connect_db.php');
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
  }
  else
  { 
    if($_SESSION['type']!='alumni'){
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
      <link type="text/css" rel="stylesheet" href="profile.css"/ >

      <script src="jquery.js"></script>
      <script type="text/javascript" src="menu.js"></script>
  </head>
  <body>
<?php include('header.php'); ?>

    <div class="wrap_400">
     
      <div id="line">
<?php
        if(isset($_GET['flag'])){
          $flag=$_GET['flag']; 
          if($flag==3)  echo '<p>Password changed';
          elseif($flag==4) echo '<p>Profile Saved';

        }
        else
          echo '<p>Welcome';
?>
      
      
        <a href="edit_profile.php" id="edit">Edit Profile</a>
        <a href="change_password.php" id="change">Change password</a>
      </p>
      
      </div>
      
<?php     $query="SELECT firstname,lastname,dob,email,degree,passing_year,about, occupation, address, discipline, city, state, phone, avatar FROM `alumni` WHERE id='".$_SESSION['id']."' ";

          $query_run=mysql_query($query) or die('cannot execute query');

          $query_num_rows=mysql_num_rows($query_run);

            if($query_num_rows==1)
                { $query_row=mysql_fetch_assoc($query_run);
                  $firstname = $query_row['firstname'];
                  $lastname = $query_row['lastname'];
                  $dob = $query_row['dob'];
                  $email = $query_row['email'];
                  $degree = $query_row['degree'];
                  $passing_year = $query_row['passing_year'];
                  $occupation = $query_row['occupation'];
                  $address = $query_row['address'];
                  $about = $query_row['about'];
                  $discipline = $query_row['discipline'];
                  $city = $query_row['city'];
                  $state = $query_row['state'];
                  $phone = $query_row['phone'];
                  $avatar = $query_row['avatar'];
                } 
?>
      <div class="drop-shadow raised" style="width:220px;height:300px;">
          <img src="<?php echo $avatar; ?>" width="180" height="250" style="height:250px;width:220px; background-color:#2D2D2D;"/> 
          <p> <?php echo $firstname.' '.$lastname; ?><br/>
               <?php echo $degree.', '.$passing_year; ?> </p>        
      </div>
        
    	<div id="profile">
    		<table>
          <tr>
            <td class="heading">About Me:</td>
            <td><?php echo $about; ?></td>
          </tr>
          <tr>
            <td class="heading">Occupation:</td>
            <td><?php echo $occupation; ?></td>
          </tr>
          <tr>
            <td class="heading">Discipline:</td>
            <td><?php echo $discipline; ?></td>
          </tr>
          <tr>
            <td class="heading">Permanent Address:</td>
            <td><?php echo $address; ?></td>
          </tr>
          <tr>
            <td class="heading">Dob:</td>
            <td><?php echo $dob; ?></td>
          </tr>
          <tr>
            <td class="heading">Email:</td>
            <td><?php echo $email; ?> </td>
          </tr>
          <tr>
            <td class="heading">City:</td>
            <td><?php echo $city; ?></td>
          </tr>
          <tr>
            <td class="heading">State:</td>
            <td><?php echo $state; ?></td>
          </tr>
          <tr>
            <td class="heading">Phone No.:</td>
            <td><?php echo $phone; ?></td>
          </tr>
        </table>
    	</div>
      
      <div style="clear:both;"></div>  
    </div>
  </body>
  </html>

  <?php } ?>