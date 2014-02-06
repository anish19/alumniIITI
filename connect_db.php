<?php        
        $host='localhost';
        $username='root';
        $password='';
        $database='profiles';

        if(!@mysql_connect($host,$username,$password) || !@mysql_select_db($database)){
              die("Error");
        
	}
?>