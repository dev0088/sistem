<?php require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
	if(isset($_POST['submit']))
	{//print_r("hhh");die;
	    $id=$_POST['id'];
	$name=$_POST['name'];
	$subcategory_name=$_POST['subcategory_name'];
	$pmc_quantity_of_people=$_POST['pmc_quantity_of_people'];
	$pmc_hours=$_POST['pmc_hours'];
	$pmc_cost=$_POST['pmc_cost'];
	$pmtot_cost=$_POST['pmc_quantity_of_people']*$_POST['pmc_hours']*$_POST['pmc_cost'];
	
	$sql = "UPDATE `labor` 
	SET `pmc_quantity_of_people`='$pmc_quantity_of_people',
	`pmc_hours`='$pmc_hours',`pmc_cost`='$pmc_cost',
	`pmtot_cost`='$pmtot_cost' WHERE `id`='$id'";
// 		print_r($sql);die;

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	//mysqli_close($conn);
	}
?>