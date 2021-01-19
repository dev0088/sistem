<?php

//configure constants

$directory = realpath(dirname(__FILE__));
$document_root = realpath($_SERVER['DOCUMENT_ROOT']);
$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .
    $_SERVER['HTTP_HOST'];
if(strpos($directory, $document_root)===0) {
    $base_url .= str_replace(DIRECTORY_SEPARATOR, '/', substr($directory, strlen($document_root)));
}
$base_url .= "/~sistemam3/";
defined("APP_URL") ? null : define("APP_URL", str_replace("/lib-2", "", $base_url));
//Assets URL, location of your css, img, js, etc. files
defined("ASSETS_URL") ? null : define("ASSETS_URL", APP_URL);

//database server
define('DB_SERVER', "localhost");
define('DB_USER', "sistemam_user");
define('DB_PASS', "wn-6j8=45C+o");
define('DB_DATABASE', "sistemam_db");


 /*   $servername 	= "localhost";
    $username 		= "proyecto_userila";
    $password 		= "Sw}u_yft!rOW";
    $db				= "proyecto_ila";
    $conn 			= mysqli_connect($servername, $username, $password,$db);
*/

    $servername 	= DB_SERVER;
    $username 		= DB_USER;
    $password 		= DB_PASS;
    $db				= DB_DATABASE;
    $conn 			= mysqli_connect($servername, $username, $password,$db);


//smart to define your table names also
define('TABLE_USERS', "users");

/************* DB Class ************/
require("../inc-3/Database.class.php");
require_once("../inc-3/gump.class.php"); 
require_once("../inc-3/encrypt.php"); 
require("../inc-3/Zebra_Pagination.php");

require("../inc-3/fpdf.php");
require("../inc-3/htmlparser.inc.php");
require("../inc-3/WriteHTML.php");

require("../inc-3/mpdf/mpdf.php");


//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

$ds 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
//require library files
//require_once("util.php");

require_once("func.global.php");

require_once("smartui/class.smartutil.php");
require_once("smartui/class.smartui.php");

// smart UI plugins
require_once("smartui/class.smartui-widget.php");
require_once("smartui/class.smartui-datatable.php");
require_once("smartui/class.smartui-button.php");
require_once("smartui/class.smartui-tab.php");
require_once("smartui/class.smartui-accordion.php");
require_once("smartui/class.smartui-carousel.php");
require_once("smartui/class.smartui-smartform.php");
require_once("smartui/class.smartui-nav.php");

SmartUI::$icon_source = 'fa';

// register our UI plugins
SmartUI::register('widget', 'Widget');
SmartUI::register('datatable', 'DataTable');
SmartUI::register('button', 'Button');
SmartUI::register('tab', 'Tab');
SmartUI::register('accordion', 'Accordion');
SmartUI::register('carousel', 'Carousel');
SmartUI::register('smartform', 'SmartForm');
SmartUI::register('nav', 'Nav');

require_once("class.html-indent.php");
require_once("class.parsedown.php");

?>