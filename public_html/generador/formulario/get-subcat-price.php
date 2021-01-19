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
    $result = mysqli_query($conn,"SELECT * FROM subcategories where id = $category_id");
?>
<?php
    while($row = mysqli_fetch_array($result)) {
?>
						<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
<input type="text" class="form-control input-lm" placeholder="Price" title="Price" name="price" id="price" value="<?php echo $row["price"];?>"/>
<?php
    }
	}
?>