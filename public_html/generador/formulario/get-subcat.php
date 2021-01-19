<?php 
// echo "string";die();
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	if(isset($_SESSION['logged_in']['active_employee_id']) && count($_GET) < 1)
	{
        header('Location: home.php');
        exit();
	}
	else
	{
	
    $category_id = $_POST["category_id"];
    $result = mysqli_query($conn,"SELECT * FROM subcategories where Categories = $category_id");
?>
<option value="">Select Sub Category</option>
<?php
    while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["subcategory_name"];?></option>
<?php
    }
	}
?>