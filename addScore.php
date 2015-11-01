<?php 
        $db = mysql_connect('mysql_host', 'mysql_user', 'trickortreat') or die('Could not connect: ' . mysql_error()); 
        mysql_select_db('my_database') or die('Could not select database');
 
        // Strings must be escaped to prevent SQL injection attack. 
        $name = mysql_real_escape_string($_GET['name'], $db); 
        $score = mysql_real_escape_string($_GET['score'], $db); 
         
 
        $secretKey="trickortreat"; # Change this value to match the value stored in the client javascript below 

        $real_hash = md5($name . $score . $secretKey); 
         
		// Send variables for the MySQL database class. 
		$query = "insert into user values (NULL, '$name', '$score');"; 
		$result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
        
?>