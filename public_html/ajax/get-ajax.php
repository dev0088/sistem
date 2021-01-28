<?php
 /*   $servername 	= "localhost";
    $username	 	= "proyecto_userila";
    $password 		= "Sw}u_yft!rOW";
    $db				= "proyecto_ila";
    $conn 			= mysqli_connect($servername, $username, $password,$db);
*/	
	
	$servername 	= DB_SERVER;
    $username 		= DB_USER;
    $password 		= DB_PASS;
    $db				= DB_DATABASE;
    $conn 			= mysqli_connect($servername, $username, $password,$db);
    
    
	if($_POST['action'] == 'get_employee')
	{
		$arrEmployee 		= array();
		$employeeListRes 	= $conn->query("SELECT E.id, E.fname, E.lname FROM users E 
											LEFT JOIN DATOS_GENERALES D ON (E.id = D.user_id)
											WHERE E.client_id = ".$_POST['id']." and D.user_id IS NULL GROUP BY E.id ");
		if ($employeeListRes) 
		{
			while($row = $employeeListRes->fetch_assoc()) 
			{
				$arrEmployee[$row['id']] = $row['fname'].' '.$row['lname'];
			}
		}
		echo json_encode($arrEmployee);
	}
