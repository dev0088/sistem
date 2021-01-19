<?php
ob_start();
session_start();
if (session_id() == '')
    session_start();

require_once("../../lib-2/config.php");
global $db;
if (isset($_COOKIE['pro_users']) && !isset($_SESSION["logged_in"])){
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$sql = "SELECT * FROM ".TABLE_USERS." WHERE id='".trim($_COOKIE['pro_users'])."'";
	$record = $db->query_first($sql);
	if(!empty($record)){
		$_SESSION["logged_in"] = $record;
	}
	$db->close();
}

?>