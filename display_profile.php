<?php
	if(!isset($_GET['id']))
	{
		echo 'Error '; 
	}
	else
	{	$id = $_GET['id'];
	    include('connect_db.php');
	    session_start(); 

	    if(!isset($_SESSION['id']))
	    {
	    	header('Location:login.php');
	  	}
	  	else
	  	{ 
	  		$query="SELECT firstname,lastname,dob,email,degree,passing_year,about, occupation, address, discipline, city, state, phone, avatar FROM `alumni` WHERE id='$id' ";

 	 		$query_run=mysql_query($query) or die('cannot execute query');

  			$query_num_rows=mysql_num_rows($query_run);

  				if($query_num_rows==1)
				{				
			 		  $profile = mysql_fetch_assoc($query_run);
			 		 
				}
				else
				{
					header('Location:error.php');
				}
		}
	}
?>



<!DOCTYPE HTML>
	  <html>
	  <head>
	      <meta charset="utf-8"/>
	      <title>Alumni List</title>
	      <link type="text/css" href="menu.css" rel="stylesheet" />
	      <link type="text/css" rel="stylesheet" href="style.css"/ >
	      <link type="text/css" rel="stylesheet" href="profile.css"/ >

	      <script src="jquery.js"></script>
	      <script type="text/javascript" src="menu.js"></script>
	  </head>
	  <body>
		<?php include('header.php');
			  		  $firstname = $profile['firstname'];
	                  $lastname = $profile['lastname'];
	                  $dob = $profile['dob'];
	                  $email = $profile['email'];
	                  $degree = $profile['degree'];
	                  $passing_year = $profile['passing_year'];
	                  $occupation = $profile['occupation'];
	                  $address = $profile['address'];
	                  $about = $profile['about'];
	                  $discipline = $profile['discipline'];
	                  $city = $profile['city'];
                  	  $state = $profile['state'];
                      $phone = $profile['phone'];
	                  $avatar = $profile['avatar'];	
	  	 ?>

	  	
	  	<div class="wrap_400">
     
     		 <div id="line">

		      <p> <?php echo $firstname; ?>'s Profile 
	
		      </p>
      
      		</div>

      <div class="drop-shadow raised" style="width:220px;height:300px;">
          <img src="<?php echo $avatar; ?>" width="180" height="250" style="height:250px;width:220px; background-color:#2D2D2D;"/> 
          <p> <?php echo $firstname.' '.$lastname; ?><br/>
               <?php echo $degree.', '.$passing_year; ?> </p>        
      </div>
        
    	<div id="profile">
    		<table>
          <tr>
            <td class="heading">About:</td>
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
            <td><a href="contact.php?id=<?php echo $id; ?>">Contact </a> </td>
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
