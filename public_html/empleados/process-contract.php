<?php
	if(isset($_POST['action']))
	{
		$emp_id		= $_POST['emp_id'];
		$empRes 	= $conn->query("SELECT id FROM datos_contratos_generated WHERE id_emp = '".$emp_id."' and completed = '-1' order by date DESC");
		$empRow 	= $empRes->fetch_assoc();
		$pdf_id 	= $empRow['id'];
		$temp_file	= '../../temp/contactos_'.$emp_id.'_'.$pdf_id.'.pdf';
		if($_POST['action'] == "cancel")
		{
			unlink($temp_file);
		}
		elseif($_POST['action'] == "save")
		{
			
			$companiesListQ 	= "SELECT G.nombre as name, G.fecha_de_nacimiento as dob, C.nombre as folder FROM DATOS_GENERALES G 
								   INNER JOIN clientes C ON (G.cliente_id = C.id) WHERE G.id = '".$emp_id."' LIMIT 1";
			$companiesListRes 	= $conn->query( $companiesListQ );
			$row 				= $companiesListRes->fetch_assoc(); 
			$folder				= $row['folder'];
			$sub_folder			= $row['name'].'-'.$row['dob'];
			$new_file			= '../../implementacion/documents/'.$folder.'/'.$sub_folder.'/contactos_'.$emp_id.'_'.$pdf_id.'.pdf';
			rename($temp_file, $new_file);
			$conn->query("UPDATE datos_contratos_generated SET completed = '1', file = '".$new_file."' WHERE id_emp = '".$emp_id."' and id = '".$pdf_id."'");
		}
		header('Location: index.php');
		exit;
	}
?>  