<?php

include('connect_db.php');

$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$mypassword_hash=md5($mypassword);

$query="SELECT id FROM `alumni` WHERE username='$myusername' AND password='$mypassword_hash' ";
$query_run=mysql_query($query) or die('cannot execute query');
$query_num_rows=mysql_num_rows($query_run);

if($query_num_rows==1)
{	$query_row=mysql_fetch_assoc($query_run);
	session_start();
	session_regenerate_id();
	$_SESSION['id']=$query_row['id'];
	$_SESSION['type']="alumni";
	$redirect="alum_profile.php";
}
else 
{
	if($query_num_rows==0)
	{
		$query="SELECT id FROM `student` WHERE username='$myusername' AND password='$mypassword_hash' ";
		$query_run=mysql_query($query) or die('cannot execute query');
		$query_num_rows=mysql_num_rows($query_run);		

		if($query_num_rows==1)
		{	$query_row=mysql_fetch_assoc($query_run);
			session_start();

			$_SESSION['id']=$query_row['id'];
			$_SESSION['type']="student";
			$redirect="student_profile.php";
		}
		else
		{
			if($query_num_rows==0)
			{
				$query="SELECT id FROM `admin` WHERE username='$myusername' AND password='$mypassword_hash' ";
				$query_run=mysql_query($query) or die('cannot execute query');
				$query_num_rows=mysql_num_rows($query_run);		

				if($query_num_rows==1)
				{	$query_row=mysql_fetch_assoc($query_run);
					session_start();
					$_SESSION['id']=$query_row['id'];
					$_SESSION['type']="admin";
					$redirect="admin_profile.php";
					}
				else
				{	
					$redirect="notlogin.php";
				}
			}
		}
	}
}

$url = isset($_SESSION['url']) ? $_SESSION['url'] : $redirect ; 
unset($_SESSION['url']) ; 
header('Location:'.$url);
 
 ?>
