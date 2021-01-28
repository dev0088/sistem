<?php
		$data	 = array();	
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		
		
		$filtersSQL  =  $filtersClient	= "";
		
		
		
		if( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
		{
			foreach($signedUser['plaza_id'] as $plaza_id)
			{
				$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (C.plaza_id = " . $plaza_id . ") ";
			}
		}
		else if((count($signedUser['client_id']) > 0) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_companies'] == 0)
		{
			foreach($signedUser['client_id'] as $client_id)
			{
				$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (C.id = " . $client_id . ") ";
			}
		}
		
		if($filtersClient !== "")
		{
			$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (" . $filtersClient . ") ";
		}
		
		
		
		
		
		
		$objData = $db->fetch_all_array("SELECT	A.*, PS.fname as from_fname, PS.lname as from_lname, C.nombre as client_name FROM user_appointments A
										 LEFT JOIN users PS ON (PS.id = A.post_from)
										 LEFT JOIN clientes C ON (C.id = A.client_id)
										 ".$filtersSQL);
		
		
		if($objData)
		{
			 foreach($objData as $obj) 
             {
				$to 		= '';
				$usrData 	= $db->fetch_all_array("SELECT	A.*, U.fname as to_fname, U.lname as to_lname FROM user_appointment_list A
				 								 LEFT JOIN users U ON (U.id = A.id_user)
												 WHERE A.id_appointment = '".$obj['id']."'");		
				foreach($usrData as $uobj) 
             	{
				 	$to	.= $uobj['to_fname']." ".$uobj['to_lname'].'<br/>';
				}
				if($signedUser['id'] == $obj['post_from'] && !isset($signedUser['temp']['company_id'])){
					 $color	= "bg-color-red";
					 $user	= "TO: ".$to;
				 }
				 elseif($signedUser['id'] == $obj['post_to'] && !isset($signedUser['temp']['company_id'])){
					$color	= "bg-color-green";
					$user	= "FROM: ".$obj['from_fname']." ".$obj['from_lname'];
				 }
				 else
				 {
					$color	= "bg-color-blue";
					$user	= "FROM: ".$obj['from_fname']." ".$obj['from_lname']. ' ' . "TO: ".$to;
				 }
				$date		=	$obj['appointmentDate'];
				$title		=	$obj['title'];
				$desc		=	$obj['description'];
				$id			= 	$obj['id'];
				$company	= 	$obj['client_name'];
				$start		=	date('Y-m-d H:i:s', strtotime($date));
				$end		=	date('Y-m-d H:i:s', strtotime($date));
				$data[]		=	array(
										'id' 			=> $id,
										'title' 		=> "$user",
										'company' 		=> "$company",
										'description' 	=> "$title",
										'notes'			=> "$desc",
										'className' 	=> array("event", $color),
										'icon'			=> "fa-clock-o" ,
										'start' 		=> "$start",
										'end' 			=> "$end"
									);
									
									
									
			 }
			echo json_encode($data);
		}
		unset($objData);
