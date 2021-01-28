<?php
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$users 		= $db->fetch_all_array(" SELECT * FROM `users` WHERE id != '".$_SESSION['logged_in']['id']."' and role_id !=15 and role_id !=16 ORDER BY `id` ASC ");
	$fusers 		= $db->fetch_all_array(" SELECT * FROM `users` WHERE id != '".$_SESSION['logged_in']['id']."' and role_id =15 ORDER BY `id` ASC ");
	$fzusers 		= $db->fetch_all_array(" SELECT * FROM `users` WHERE id != '".$_SESSION['logged_in']['id']."' and role_id =16 ORDER BY `id` ASC ");
	
    $filtersSQL = $filtersClient = "";
	if( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (plaza_id = " . $plaza_id . ") ";
		}
	}
	else if((count($signedUser['client_id']) > 0) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (id = " . $client_id . ") ";
		}
	}

	if($filtersClient !== "")
	{
		$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (" . $filtersClient . ") ";
	}
	
	
	$sql			= "SELECT * FROM `clientes` ";
    if ($filtersSQL != "") 
	{
        $sql 	.= ' WHERE ' . $filtersSQL;
    }
	$sql 	.= '  ORDER BY `id` ASC';
	
	$clients 		= $db->fetch_all_array($sql);
	$dropdown	= $clients;
	$select = '<select class="fc-head-select fc-corner-left fc-corner-right"><option value="">Filtrar por</option>';
	foreach($clients as $client){
		$select .= '<option>'.$client['nombre'].'</option>';
	}
	$select .= '</select>';
