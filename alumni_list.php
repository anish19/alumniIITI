<?php
  session_start();
  include('connect_db.php');
	if(!isset($_SESSION['id']))
	{
		header('Location:login.php');
	}
	else
	{
	  if((!isset($_GET['year'])) && (!isset($_GET['degree'])) && (!isset($_GET['discipline'])))
	  {
	  	header('Location:search_alumni.php');
	  }
	  else
	  {
	  	  $year = $_GET['year'];
		  $degree = $_GET['degree'];
		  $discipline = $_GET['discipline'];

		  if($year=="none" && $degree=="none" && $discipline=="none")
		  {
		  	header('Location:search_alumni.php?flag=1');
		  }
		  else
		  {
			  if($year=="none")
			  {
			  	if($degree=="none")
			  	{
			  		
			  		$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE discipline='$discipline'";
					$query_run=mysql_query($query) or die('cannot execute query');
					$query_num_rows=mysql_num_rows($query_run);	
					if($query_num_rows==0){
						header('Location:search_alumni.php?flag=2');
					}	
					else
					{
						$i = 0;
						while($process=mysql_fetch_assoc($query_run)){
							$list[$i] = $process;
							$i++;
							}
					}
			  	}
			  	else
			  	{
			  		if($discipline=="none")
			  		{
			  			$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE degree='$degree'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
						}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
								}
							}
			  		}
			  		else
			  		{
			  			$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE degree='$degree' AND discipline='$discipline'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
							}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
								}
							}

			  		}

			  	
			  	}
			 }
			 else
			 {
			  	if($degree=="none")
			  	{		
			  		if($discipline=="none"){
				  		$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE passing_year='$year'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
						}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
							}
						}
			  		}
			  		else
			  		{
			  			$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE discipline='$discipline' AND passing_year='$year'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
						}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
							}
						}
			  		}
			  	}
			  	else
			  	{
			  		if($discipline=="none"){
			  			$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE degree='$degree' AND passing_year='$year'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
						}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
								}
							}
			  		}
			  		else{
			  			$query="SELECT id,firstname, lastname, passing_year, discipline, degree FROM `alumni` WHERE degree='$degree' AND discipline='$discipline' AND passing_year='$year'";
						$query_run=mysql_query($query) or die('cannot execute query');
						$query_num_rows=mysql_num_rows($query_run);	
						if($query_num_rows==0){
							header('Location:search_alumni.php?flag=2');
							}	
						else{
							$i = 0;
							while($process=mysql_fetch_assoc($query_run)){
								$list[$i] = $process;
								$i++;
								}
							}

			  			}

			  		}
			  	}
			}?>


	<!DOCTYPE HTML>
	  <html>
	  <head>
	      <meta charset="utf-8"/>
	      <title>Alumni List</title>
	      <link type="text/css" href="menu.css" rel="stylesheet" />
	      <link type="text/css" rel="stylesheet" href="style.css"/ >
	      <link type="text/css" rel="stylesheet" href="alumni_list.css"/ >

	      <script src="jquery.js"></script>
	      <script type="text/javascript" src="menu.js"></script>
	  </head>
	  <body>
	    <?php include('header.php'); ?>
		<div class = "wrap_400">
			<table>
				<tr>
					<th> Name </th>
					<th> Passing Year </th>
					<th> Type of Degree </th>
					<th> Discipline </th>
				</tr>
			
				<?php 	$i=0;
						while($query_num_rows!=-0){
							echo "<tr>";
							$display = $list[$i]['firstname'].' '.$list[$i]['lastname'];
							$id = $list[$i]['id'];
							echo "<td><a href=\"display_profile.php?id=$id\"> $display </a></td>"; 
							$display = $list[$i]['passing_year'];
							echo "<td> $display </td>";
							$display = $list[$i]['degree'];
							echo "<td> $display </td>";
							$display = $list[$i]['discipline'];
							echo "<td> $display </td>";
							echo "</tr>";
							$query_num_rows--;
							$i++;
						}
						
				?>
						
			</table>
		
		</div>
	  
	  </body>
	  </html>
	  
	  <?php 
			}
		}
	  ?>
