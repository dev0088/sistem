<?php 
	$id = 0;
	$converter 	= new Encryption;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key_get 		= key($_GET);
		$string 	= $converter->decode($key_get);
		$array		= explode('=', $string);
		if($array[0] == 'id')
		{
			$id	=	$array[1];
		}
	}
	if($id==0)
	{
        header('Location: home.php');
	}
    $content		= "";
    $totalRes 		= $conn->query("SELECT * from datos_contratos where id='".$id."'");
	$row 			= $totalRes->fetch_assoc();
	$content		= str_replace("\n", "", (base64_decode($row['content']))); 
	$name			= $row['name'];
	$facturadora_id	= $row['facturadora_id'];
	$facturadoras	= $db->fetch_all_array("SELECT * FROM `facturadoras` ORDER BY `nombre` ASC ");
