<?php 
	$facturadoras		= $db->fetch_all_array("SELECT * FROM `facturadoras` ORDER BY `nombre` ASC ");
