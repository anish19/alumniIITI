<?php 
  include('connect_db.php');
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
  }
  else
  { 
    if($_SESSION['type']!='student'){
        header('Location:error.php');   
    }

    ?>


    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Alumni IITI</title>
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
          

        }
        else
          echo '<p>Welcome';
?>
      
      
        
        <a href="change_password.php" id="change">Change password</a>
      </p>
      
      </div>
    
      		
      		
          <?php $query="SELECT firstname,lastname FROM `student` WHERE id='".$_SESSION['id']."' ";

    				$query_run=mysql_query($query) or die('cannot execute query');

    				$query_num_rows=mysql_num_rows($query_run);

    					if($query_num_rows==1)
    							{	$query_row=mysql_fetch_assoc($query_run);
    								$firstname = $query_row['firstname'];
    								$lastname = $query_row['lastname'];
    				 			} 
                  

        
               ?>
    				

             Name : <?php echo $firstname.' '.$lastname; ?>
    			
    			
      		
      	</div>
      </div>
    </body>
    </html>
    <?php } ?>