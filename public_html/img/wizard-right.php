<?php

    //initilize the page
    require_once("inc/init.php");

    //require UI configuration (nav, ribbon, etc.)
    require_once("inc/config.ui.php");

    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Nuevo expediente";
/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "wizard.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["Implementacion"]["sub"]["Nuevo expediente"]["active"] = false;
include("inc/nav.php");

    $pageURL = APP_URL . 'employee-edit.php';
    
    
     /*   $servername 	= "localhost";
    $username	 	= "proyecto_userila";
    $password 		= "Sw}u_yft!rOW";
    $db				= "proyecto_ila";
    $conn 			= mysqli_connect($servername, $username, $password,$db);
*/	
	
	$servername 	= DB_SERVER;
    $username 		= DB_USER;
    $password 		= DB_PASS;
    $db				= DB_DATABASE;
    $conn 			= mysqli_connect($servername, $username, $password,$db);
    
    
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    
    $arrCompanies = array();
    $companiesListQ = " SELECT `id`, `nombre` FROM `clientes` ORDER BY `id` ASC ";
    $companiesListRes = $conn->query( $companiesListQ );
    if ( $companiesListRes ) {
        while( $row = $companiesListRes->fetch_assoc() ) {
            if ( null === $companyId ) {
                $companyId = $row['id'];
            }
            $arrCompanies[] = array('value' => $row['id'], 'title' => $row['nombre']);
        }
    }
    
    $companyIdParam = (isset($_GET['company_id']) ? intval($_GET['company_id']) : null);
    if ( $companyIdParam < 1 ) {
        $companyIdParam = null;
    }
    
    $currStepId = (isset($_GET['step']) ? intval($_GET['step']) : 1);
    if ( (1 > $currStepId) || (10 < $currStepId) ) {
        $currStepId = 1;
    }

    $stepsData = array(
        1 => array(
            'title' => 'Datos Generales',
            'table' => 'DATOS_GENERALES',
            'fields' => array(
                array(
                    'field' => 'cliente_id',
                    'title' => 'Cliente',
                    'type' => 'select',
                    'value' => (null !== $companyIdParam ? $companyIdParam : ''),
                    'addon' => 'fa-user',
                    'options' => $arrCompanies
                ),
                array(
                    'field' => 'nombre',
                    'title' => 'Nombre',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'apellido_paterno',
                    'title' => 'Apellido paterno',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'apellido_materno',
                    'title' => 'Apellido materno',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'estado_civil',
                    'title' => 'Estado civil',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'curp',
                    'title' => 'Curp',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'fecha_de_nacimiento',
                    'title' => 'Fecha de nacimiento',
                    'type' => 'date',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'lugar_de_nacimiento',
                    'title' => 'Lugar de nacimiento',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'nss',
                    'title' => 'Nss',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'rfc',
                    'title' => 'Rfc',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'domicilio_completo',
                    'title' => 'Domicilio completo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cp',
                    'title' => 'Cp',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
					'id'	=> 'clockpicker',
                    'field' => 'tiempo_de_radicar',
                    'title' => 'Tiempo de radicar(eg:- 11:57:46)',
                    'type'  => 'time',
                    'value' => '',
                    'addon' => 'fa-clock-o'
                ),
                array(
                    'field' => 'tel_hogar',
                    'title' => 'Tel hogar',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-phone'
                ),
                array(
                    'field' => 'celular',
                    'title' => 'Celular',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-phone'
                ),
                array(
                    'field' => 'email',
                    'title' => 'Email',
                    'type' => 'email',
                    'value' => '',
                    'addon' => 'fa-envelope'
                ),
                array(
                    'field' => 'sueldo_mensul',
                    'title' => 'Sueldo Mensual',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'puesto',
                    'title' => 'Puesto',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'unidad_medica_familiar',
                    'title' => 'Unidad medica familiar',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'afore_que_administra_su_cuenta',
                    'title' => 'Afore que administra su cuenta',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'credito_infonavit',
                    'title' => 'Credito infonavit',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_credito_infonavit',
                    'title' => 'No de credito infonavit',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'credito_fonacot',
                    'title' => 'Credito fonacot',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_credito_fonacot',
                    'title' => 'No de credito fonacot',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'pension_alimenticia',
                    'title' => 'Pension alimenticia',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'procentaje_o_importe_de_pension',
                    'title' => 'Porcentaje o importe de pensi&ograve;n',
                    'type' => 'float',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tiene_otro_empleo',
                    'title' => 'Tiene otro empleo',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'tiene_otro_ingreso',
                    'title' => 'Tiene otro ingreso',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'presentara_declaracion_anual',
                    'title' => 'Presentara declaracion anual',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                )
            )
        ),
        
        array(
            'title' => 'Documentaci&oacute;n',
            'table' => 'DOCUMENTACION',
            'fields' => array(
                array(
                    'field' => 'credencial_de_elector',
                    'title' => 'Credencial de elector',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_credencial_de_elector',
                    'title' => 'No de credencial de elector',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cedula_profesional',
                    'title' => 'C&eacute;dula profesional',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_Cedula',
                    'title' => 'No de C&eacute;dula',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cartilla_militar',
                    'title' => 'Cartilla militar',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_cartilla_militar',
                    'title' => 'No de cartilla militar',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'licencia_de_manejo',
                    'title' => 'Licencia de manejo',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'no_de_licencia_de_manejo',
                    'title' => 'No de licencia de manejo',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tipo_de_licencia_de_manejo',
                    'title' => 'Tipo de licencia de manejo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Referencias personales',
            'table' => 'REFERENCIAS_PERSONALES',
            'fields' => array(
                array(
                    'field' => 'nombre_completo_1',
                    'title' => 'Nombre completo 1',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'domicilio_1',
                    'title' => 'Domicilio 1',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'telefono_1',
                    'title' => 'Telefono 1',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tiempo_de_conocerlo_1',
                    'title' => 'Tiempo de conocerlo 1(eg:- 11:57:43)',
                    'type' => 'time',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'nombre_completo_2',
                    'title' => 'Nombre completo 2',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'domicilio_2',
                    'title' => 'Domicilio 2',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'telefono_2',
                    'title' => 'Telefono 2',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tiempo_de_conocerlo_2',
                    'title' => 'Tiempo de conocerlo 2 (eg:- 11:57:43)',
                    'type' => 'time',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'nombre_completo_3',
                    'title' => 'Nombre completo 3',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'domicilio_3',
                    'title' => 'Domicilio 3',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'telefono_3',
                    'title' => 'Telefono 3',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tiempo_de_conocerlo_3',
                    'title' => 'Tiempo de conocerlo 3 (eg:- 11:57:43)',
                    'type' => 'time',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Datos familiares',
            'table' => 'datos_familiares',
            'fields' => array(
                array(
                    'field' => 'padre',
                    'title' => 'Padre',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'padre_vive',
                    'title' => 'Padre vive',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'padre_depende_economicamente',
                    'title' => 'Padre depende economicamente',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'padre_ocupacion',
                    'title' => 'Padre ocupacion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'madre',
                    'title' => 'Madre',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'madre_vive',
                    'title' => 'Madre vive',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'madre_depende_economicamente',
                    'title' => 'Madre depende economicamente',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'madre_ocupacion',
                    'title' => 'Madre ocupacion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'esposo',
                    'title' => 'Esposo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'esposo_vive',
                    'title' => 'Esposo vive',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'esposo_depende_economicamente',
                    'title' => 'Esposo depende economicamente',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'esposo_ocupacion',
                    'title' => 'Esposo ocupacion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo',
                    'title' => 'Hijo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo_vive',
                    'title' => 'Hijo vive',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'hijo_depende_economicamente',
                    'title' => 'Hijo depende economicamente',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo_ocupacion',
                    'title' => 'Hijo ocupacion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo2',
                    'title' => 'hijo2',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo2_vive',
                    'title' => 'Hijo2 vive',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'hijo2_depende_economicamente',
                    'title' => 'Hijo2 depende economicamente',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'hijo2_ocupacion',
                    'title' => 'Hijo2 ocupacion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Datos econ&oacute;micos',
            'table' => 'datos_economicos',
            'fields' => array(
                array(
                    'field' => 'posee_bienes_inmuebles',
                    'title' => 'Posee bienes inmuebles',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'ubicacion_bienes_inmuebles',
                    'title' => 'Ubicacion bienes inmuebles',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'valor_aprox_bienes_inmuebles',
                    'title' => 'Valor aprox bienes inmuebles',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'posee_automovil',
                    'title' => 'Posee automovil',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'marca_automovil',
                    'title' => 'Marca automovil',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'modelo_automovil',
                    'title' => 'Modelo automovil',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'valor_automovil',
                    'title' => 'Valor automovil',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'pagado_automovil',
                    'title' => 'Pagado automovil',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'deudas_pendientes',
                    'title' => 'Deudas pendientes',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'tipo_de_deuda',
                    'title' => 'Tipo de deuda',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'monto_de_deuda',
                    'title' => 'Monto de deuda',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'pagos_vencidos',
                    'title' => 'Pagos vencidos',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'tarjeta_de_credito',
                    'title' => 'Tarjeta de credito',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'banco_de_tarjeta_de_credito',
                    'title' => 'Banco de tarjeta de credito',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'tarjeta_de_nomina',
                    'title' => 'Tarjeta de nomina',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'banco_de_tarjeta_de_nomina',
                    'title' => 'Banco de tarjeta de nomina',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'credito_hipotecario',
                    'title' => 'Credito hipotecario',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'credito_comercial',
                    'title' => 'Credito comercial',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'credito_departamental',
                    'title' => 'Credito departamental',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'credito_automotriz',
                    'title' => 'Credito automotriz',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'credito_bancario',
                    'title' => 'Credito bancario',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'credito_otro',
                    'title' => 'Credito otro',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') )
                ),
                array(
                    'field' => 'cantidad_de_adeudo_infonavit',
                    'title' => 'Cantidad de adeudo infonavit',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_fonacot',
                    'title' => 'Cantidad de adeudo fonacot',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_departamental',
                    'title' => 'Cantidad de adeudo departamental',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_hipotecario',
                    'title' => 'Cantidad de adeudo hipotecario',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_automotriz',
                    'title' => 'Cantidad de adeudo automotriz',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_otros',
                    'title' => 'Cantidad de adeudo otros',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_bancario',
                    'title' => 'Cantidad de adeudo bancario',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cantidad_de_adeudo_comercial',
                    'title' => 'Cantidad de adeudo comercial',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Vivienda',
            'table' => 'vivienda',
            'fields' => array(
                array(
                    'field' => 'zona_ubicada',
                    'title' => 'Zona ubicada',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Urbana'), 
                        array('value' => '1', 'title' => 'Alta') ,
                        array('value' => '2', 'title' => 'Media'),
                        array('value' => '3', 'title' => 'Lujo')
                    )
                ),
                array(
                    'field' => 'caractaeristicas',
                    'title' => 'Caractaeristicas',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Casa en condominio'), 
                        array('value' => '1', 'title' => 'Departamento'),
                        array('value' => '2', 'title' => 'Unidad Habitacional'),
                        array('value' => '3', 'title' => 'Vivienda Popular'),
                        array('value' => '4', 'title' => 'Residencial'),
                        array('value' => '5', 'title' => 'Lujo')
                    )
                ),
                array(
                    'field' => 'tipo',
                    'title' => 'Tipo',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Propia'), 
                        array('value' => '1', 'title' => 'Pagandola'), 
                        array('value' => '2', 'title' => 'De familiares'), 
                        array('value' => '3', 'title' => 'De amigos'), 
                        array('value' => '4', 'title' => 'Alquiler')
                    )
                ),
                array(
                    'field' => 'recamaras',
                    'title' => 'Recamaras',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Una'), 
                        array('value' => '1', 'title' => 'Dos'), 
                        array('value' => '2', 'title' => 'Tres'), 
                        array('value' => '3', 'title' => 'Mas de Tres')
                    )
                ),
                array(
                    'field' => 'banos',
                    'title' => 'Banos',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Uno'), 
                        array('value' => '1', 'title' => 'Dos'), 
                        array('value' => '2', 'title' => 'Tres'), 
                        array('value' => '3', 'title' => 'Mas de Tres'), 
                    )
                ),
                array(
                    'field' => 'pisos_o_plantas',
                    'title' => 'Pisos o plantas',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Uno'), 
                        array('value' => '1', 'title' => 'Dos'), 
                        array('value' => '2', 'title' => 'Mas de Dos'), 
                    )
                ),
                array(
                    'field' => 'areas_de_la_vivienda',
                    'title' => 'Areas de la vivienda',
                    'type' => 'multiselect',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( 
                        array('value' => '0', 'title' => 'Sala'), 
                        array('value' => '1', 'title' => 'Comedor'), 
                        array('value' => '2', 'title' => 'Cocina'), 
                        array('value' => '3', 'title' => 'Jardin'), 
                        array('value' => '4', 'title' => 'Estacionamiento'), 
                        array('value' => '5', 'title' => 'Patio'), 
                    )
                )
            )
        ),
        
        array(
            'title' => 'Gastos mensuales',
            'table' => 'gastos_mensuales',
            'fields' => array(
                array(
                    'field' => 'luz',
                    'title' => 'Luz',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'agua',
                    'title' => 'Agua',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'predial',
                    'title' => 'Predial',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'gas',
                    'title' => 'Gas',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'telefono',
                    'title' => 'Telefono',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'transporte_publico',
                    'title' => 'Transporte publico',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'alimentos',
                    'title' => 'Alimentos',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'calzado',
                    'title' => 'Calzado',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'articulos_de_aseo',
                    'title' => 'Articulos de aseo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'agua_potable',
                    'title' => 'Agua potable',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'servicios_medicos',
                    'title' => 'Servicios medicos',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'gastos_vacacionales',
                    'title' => 'Gastos vacacionales',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'ahorro',
                    'title' => 'Ahorro',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'mantenimiento_de_vivienda',
                    'title' => 'Mantenimiento de vivienda',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'mantenimiento_de_vehiculo',
                    'title' => 'Mantenimiento de vehiculo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'servicio_domestico',
                    'title' => 'Servicio domestico',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'utiles_escolares',
                    'title' => 'Utiles escolares',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'uniformes_escolares',
                    'title' => 'Uniformes escolares',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'transporte_escolar',
                    'title' => 'Transporte escolar',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'cuotas_escolares',
                    'title' => 'Cuotas escolares',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'otros_gastos',
                    'title' => 'Otros gastos',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'total_de_gastos',
                    'title' => 'Total de gastos',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Datos escolares',
            'table' => 'datos_escolares',
            'fields' => array(
                array(
                    'field' => 'primaria_nombre_de_la_institucion',
                    'title' => 'Primaria: nombre de la institucion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'primaria_entidad_federativa',
                    'title' => 'Primaria: entidad federativa',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'primaria_anos_cursados',
                    'title' => 'Primaria: anos cursados',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'primaria_certificado_titulo',
                    'title' => 'Primaria: certificado titulo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'secuandaria_nombre_de_la_institucion',
                    'title' => 'Secuandaria: nombre de la institucion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'secuandaria_entidad_federativa',
                    'title' => 'Secuandaria: entidad federativa',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'secuandaria_anos_cursados',
                    'title' => 'Secuandaria: anos cursados',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'secuandaria_certificado_titulo',
                    'title' => 'secuandaria: certificado titulo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'preparatoria_nombre_de_la_institucion',
                    'title' => 'Preparatoria: nombre de la institucion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'preparatoria_entidad_federativa',
                    'title' => 'Preparatoria: entidad federativa',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'preparatoria_anos_cursados',
                    'title' => 'Preparatoria: anos cursados',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'preparatoria_certificado_titulo',
                    'title' => 'Preparatoria: certificado titulo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'universidad_nombre_de_la_institucion',
                    'title' => 'Universidad: nombre de la institucion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'universidad_entidad_federativa',
                    'title' => 'Universidad: entidad federativa',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'universidad_anos_cursados',
                    'title' => 'Universidad: anos cursados',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'universidad_certificado_titulo',
                    'title' => 'Universidad: certificado titulo',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        ),
        
        array(
            'title' => 'Datos del beneficiario',
            'table' => 'datos_del_beneficiario',
            'fields' => array(
                array(
                    'field' => 'nombre',
                    'title' => 'Nombre',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'apellido_paterno',
                    'title' => 'Apellido paterno',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'apellido_materno',
                    'title' => 'Apellido materno',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'parentesco',
                    'title' => 'Parentesco',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'fecha_de_nacimiento',
                    'title' => 'Fecha de nacimiento',
                    'type' => 'date',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'direccion',
                    'title' => 'Direccion',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'rstado_civil',
                    'title' => 'Rstado civil',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                ),
                array(
                    'field' => 'rfc',
                    'title' => 'Rfc',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user'
                )
            )
        )
        
    );

    $employeeIdParam = 
        (null === $dgRecId ? 
            (isset($_GET['employee_id']) ? intval($_GET['employee_id']) : null)
                : $dgRecId);
    
    $postActionErrorMsg 		= null;
    $postActionNotificationMsg 	= null;
    $postAction 				= (isset($_POST['action']) ? trim($_POST['action']) : null);
    $postActionStep 			= (isset($_POST['post_action_step']) ? intval($_POST['post_action_step']) : null);
    if(( 1 > $postActionStep) || ( 9 < $postActionStep)) 
	{
        $postActionStep = null;
    }
    $dgRecId 					= (isset($_POST['dg_id']) ? intval($_POST['dg_id']) : null);
    if( 1 > $dgRecId ) 
	{
        $dgRecId = null;
    }
    if( (null === $dgRecId) && (null !== $employeeIdParam) ) 
	{
        $dgRecId = $employeeIdParam;
    }
   ?> 
<!--  //echo "\n\n\n<script type='text/javascript'>console.log('post  : " . JSON_Encode($_POST) . "'); </script>\n\n\n";
     //echo "\n\n\n<script type='text/javascript'>//console.log('postAction  : " . JSON_Encode($postAction) . "'); </script>\n\n\n";
    //echo "\n\n\n<script type='text/javascript'>//console.log('dgRecId  : " . JSON_Encode($dgRecId) . "'); </script>\n\n\n";
-->    
<?php
	$continue 	= 0;
	$action		= "wizard.php";
	if ( $postAction && (null !== $postActionStep) ) 
	{
        if ( 'save' === $postAction ) 
		{
			if($stepData && 1 === $postActionStep) 
			{
				$email = test_input($_POST["1-email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
				  	$emailErr = "Invalid email format";
				}
				else
				{
					$action	.=	($employeeIdParam ? "?employee_id={$employeeIdParam}" : "") . ($employeeIdParam ? "&":"?") . "step=" . ($currStepId+1);
				}
			}
			
			if($continue)
			{
				$stepData = ( isset($stepsData[$postActionStep]) ? $stepsData[$postActionStep] : null);
				
				if ( $stepData && ((1 === $postActionStep) || (null !== $dgRecId) ) ) 
				{
					$blnExists 		= false;
					$stepPostData 	= array();
					if ( 1 !== $postActionStep ) 
					{
						$stepPostData['dg_id'] 	= $dgRecId;
						$existingQ 				= "SELECT COUNT(*) as `total_num` FROM `{$stepData['table']}` WHERE `dg_id`={$dgRecId} ";
						$existingRes 			= $conn->query($existingQ);
						if($existingRes &&($row = $existingRes->fetch_assoc()) && (0 < intval($row['total_num']))) 
						{
							$blnExists = true;
						}
					} 
					else 
					{
						if ( null !== $dgRecId ) 
						{
							$existingQ 		= "SELECT COUNT(*) as `total_num` FROM `{$stepData['table']}` WHERE `id`={$dgRecId} ";
							$existingRes 	= $conn->query($existingQ);
							if($existingRes && ($row = $existingRes->fetch_assoc()) && (0 < intval($row['total_num']))) 
							{
								$blnExists = true;
							}
						}
					}
					//echo "\n\n\n<script type='text/javascript'>console.log('blnExists  : " . JSON_Encode($blnExists) . "');<\script>\n\n\n";
					
					foreach( $stepData['fields'] as $sdField ) 
					{
						if ( in_array($sdField['type'], array('email', 'text')) ) 
						{
							$postIndex 							= "{$postActionStep}-{$sdField['field']}";
							$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? addslashes($_POST[$postIndex]) : "");
						} 
						elseif ( in_array($sdField['type'], array('select', 'integer')) ) 
						{
							$postIndex 							= "{$postActionStep}-{$sdField['field']}";
							$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? intval($_POST[$postIndex]) : 0);
							
							if ( ('cliente_id' === $sdField['field']) && ( 1 > $stepPostData[$sdField['field']]) ) 
							{
								$stepPostData[$sdField['field']] = $arrCompanies[0]['value'];
							}
						} 
						elseif ( 'multiselect' === $sdField['type'] ) 
						{
							$postIndex 		= "{$postActionStep}-{$sdField['field']}";
							$postValue 		= ( isset($_POST[$postIndex]) ? $_POST[$postIndex] : array());
							if ( !is_array($postValue) ) 
							{
								$postValue = array();
							}
							$stepPostData[$sdField['field']] 	= implode(",", $postValue);
						} 
						elseif ( 'float' === $sdField['type'] ) 
						{
							$postIndex 							= "{$postActionStep}-{$sdField['field']}";
							$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? floatval($_POST[$postIndex]) : 0);
						} 
						elseif ( 'date' === $sdField['type'] ) 
						{
							$postIndexPrefix 					= "{$postActionStep}-{$sdField['field']}";
							$postValue 							= ( isset($_POST[$postIndexPrefix]) ? $_POST[$postIndexPrefix] : null);
							$stepPostData[$sdField['field']] 	= '0000-00-00';
							if ( (null !== $postValue) && ("" !== $postValue) ) 
							{
								$data 	= DateTime::createFromFormat ( "d/m/Y" , $postValue);
								if ( $data ) 
								{
									$stepPostData[$sdField['field']] 	= $data->format("Y-m-d");
								}
							}
						} 
						elseif ( 'time' === $sdField['type'] ) 
						{
							$postIndexPrefix 					= "{$postActionStep}-{$sdField['field']}";
							$postTime 							= ( isset($_POST[$postIndexPrefix]) ? $_POST[$postIndexPrefix] : null);
							$stepPostData[$sdField['field']] 	= '00:00:00';
							if ( (null !== $postTime) && ("" !== $postTime) ) 
							{
								$time 	= DateTime::createFromFormat ( "H:i:s" , $postTime);
								if ( $time ) 
								{
									$stepPostData[$sdField['field']] = $time->format("H:i:s");
								}
							}
						}
					}
					
					$query = "";
					if ( $blnExists ) {
						$setQ = "";
	
						foreach( $stepPostData as $field => $value ) {
							$setQ .= ("" === $setQ ? "" : ", " ) . "`{$field}` = " . (is_string($value) ? "\"{$value}\"" : "{$value}");
						}
						
						if ( 1 === $postActionStep ) {
							$query = "UPDATE `{$stepData['table']}` SET " . $setQ . " WHERE `id` = {$dgRecId} ";
						} else {
							$query = "UPDATE `{$stepData['table']}` SET " . $setQ . " WHERE `dg_id` = {$dgRecId} ";
						}
	
						//echo "\n\n\n<script type='text/javascript'>console.log('[{$stepData['table']}] update Q  : " . $query . "'); <\script>\n\n\n";
					} else {
						$insertQFields = "";
						$insertQValues = "";
	
						foreach( $stepPostData as $field => $value ) {
							$insertQFields .= ("" !== $insertQFields ? ", " : "") . "`{$field}`";
							$insertQValues .= ("" !== $insertQValues ? ", " : "") . (is_string($value) ? "\"{$value}\"" : "{$value}");
						}
						$query = "INSERT INTO `{$stepData['table']}`(" . $insertQFields . ") VALUES (" . $insertQValues . ") ";
	
						//echo "\n\n\n<script type='text/javascript'>console.log('[{$stepData['table']}] insert Q  : " . $query . "'); <\script>\n\n\n";
					}
					
					$queryRes = $conn->query($query);
					if ( $queryRes ) {
						if ( (null === $dgRecId) && ('DATOS_GENERALES' === $stepData['table']) ) {
							$dgRecId = mysqli_insert_id($conn);
						}
					} else {
						$postActionErrorMsg = "Failed to complete step {$postActionStep} : " . mysqli_error($conn);
						$currStepId = $postActionStep;
					}
				} else {
					$postActionErrorMsg = "Failed to complete step {$postActionStep} : bad parameters";
					$currStepId = $postActionStep;
				}
				
				if ( null === $postActionErrorMsg ) {
					$postActionNotificationMsg = "Step {$postActionStep} complete";
				}
			}
    	}
   	} 
    
    //echo "\n\n\n<script type='text/javascript'>console.log('dgRecId (after post)  : " . JSON_Encode($dgRecId) . "'); <\script>\n\n\n";
    $objExistingEntity = null;
    
    if ( $employeeIdParam && (0 < $employeeIdParam) ) {
        if ( 1 !== $currStepId ) {
            $existingEntityQ = "SELECT * FROM `{$stepsData[$currStepId]['table']}` WHERE `dg_id` = {$employeeIdParam} LIMIT 1 ";
        } else {
            $existingEntityQ = "SELECT * FROM `{$stepsData[$currStepId]['table']}` WHERE `id` = {$employeeIdParam} LIMIT 1 ";
        }
        
        $existingEntityRes = $conn->query($existingEntityQ);
        if ( $existingEntityRes && ($row = $existingEntityRes->fetch_assoc()) ) {
            $objExistingEntity = $row;
            
            if ( isset($stepsData[$currStepId]) ) {
                foreach($stepsData[$currStepId]['fields'] as $fieldInd => $fieldData) {
                    $existingValue = (isset($row[$fieldData['field']]) ? $row[$fieldData['field']] : null);
                    
                    if ( null !== $existingValue ) {
                        $stepsData[$currStepId]['fields'][$fieldInd]['value'] = $existingValue;
                    }
                }
            }
            
            if ( 1 === $currStepId ) {
                $dgRecId = $objExistingEntity['id'];
            }
        }
    }
    //echo "\n\n\n<script type='text/javascript'>console.log('objExistingEntity  : " . JSON_Encode($objExistingEntity) . "'); <\script>\n\n\n";
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url 
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Implementacion"] = "";
		include("inc/ribbon.php");
		
		
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><i class="fa fa-pencil-square-o fa-fw "></i>
                    <span>Nuevo expediente</span>
                </h1>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<ul id="sparks" class="">
					<li class="sparks-info">
						<h5> Ingresos <span class="txt-color-blue">$47,171</span></h5>
						<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
							1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
						</div>
					</li>
					<li class="sparks-info">
						<h5> Contratos <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
						<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
					<li class="sparks-info">
						<h5> Trabajadores <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
						<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
				</ul>
			</div>
		</div>
		
		<!-- widget grid -->
		<section id="widget-grid" class="">
		
			<!-- row -->
			<div class="row">
		
            <?php if ( $postActionErrorMsg ) { ?>
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-info"></i>
                        <?= $postActionErrorMsg ?>
                    </div>
                </article>
            <?php } ?>
            <?php if ( $postActionNotificationMsg ) { ?>
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-check"></i>
                        <?= $postActionNotificationMsg ?>
                    </div>
                </article>
            <?php } ?>
				<!-- NEW WIDGET START -->
				<article class="col-sm-12 col-md-12">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
		
						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"
		
						-->
						<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
							<span class="widget-icon"> <i class="fa fa-check"></i> </span>
							<h2>Nuevo empleado</h2>
		
						</header>
		
						<!-- widget div-->
						<div>
		
                            <!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
		
							</div>
							<!-- end widget edit box -->
		
							<!-- widget content -->
							<div class="widget-body">
		
								<div class="row">
                                <?php if ( 10 === $currStepId ) { ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <div class="alert alert-success fade in">
                                            Employee added successfully!
                                        </div>
                                    </div>
                                <?php } else { ?>
									<form data-toggle="validator" role="form" id="wizard-1" method="POST" action="<?= $action; ?>" novalidate="novalidate">
										<div id="bootstrap-wizard-1" class="col-sm-12">
											<div class="form-bootstrapWizard">
												<ul class="bootstrapWizard form-wizard">
                                                <?php foreach( $stepsData as $step => $stepData ) { ?>
													<li<?= ($step === $currStepId ? " class=\"active\"" : "") ?> data-target="#step<?= $step ?>">
														<a href="#tab<?= $step ?>" data-toggle="tab"> <span class="step"><?= $step ?></span> <span class="title"><?= $stepData['title'] ?></span> </a>
													</li>
                                                <?php } ?>
												</ul>
												<div class="clearfix"></div>
											</div>
                                            
											<div class="tab-content">
                                            <?php 
                                                $stepData = (isset($stepsData[$currStepId]) ? $stepsData[$currStepId] : null);
                                                if ($stepData) { 
                                            ?>
												<div class="tab-pane active" id="tab<?= $currStepId ?>">
													<br>
													<h3><strong>Paso <?= $currStepId ?> </strong> - <?= $stepData['title'] ?></h3>
                                                    
                                                <?php foreach( $stepData['fields'] as $ind => $fieldData ) { ?>
                                                    <?php if ( 0 === $ind % 2 ) { ?>
                                                    <div class="row">
                                                    <?php } ?>
                                                    <?php if ( in_array($fieldData['type'], array('text', 'integer', 'float', 'email')) ) { ?>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-lg fa-fw"></i></span>
                                                                    <input type="<?= $fieldData['type'] ?>" class="form-control input-lg" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $fieldData['value'] ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif ( 'select' === $fieldData['type'] ) { ?>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-lg fa-fw"></i></span>
                                                                    <select class="form-control input-lg" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" title="<?= $fieldData['title'] ?>">
                                                                        <option value="">-<?= $fieldData['title'] ?>-</option>
                                                                    <?php foreach( $fieldData['options'] as $fdOption ) { ?>
                                                                        <option value="<?= $fdOption['value'] ?>"<?= ($fieldData['value'] == $fdOption['value'] ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif ( 'multiselect' === $fieldData['type'] ) { ?>
                                                        <?php $selectedValues = ( "" !== $fieldData['value'] ? explode(",", $fieldData['value']) : array() ); ?>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-lg fa-fw"></i></span>
                                                                    <select multiple class="form-control input-lg" name="<?= "{$currStepId}-{$fieldData['field']}" ?>[]" title="<?= $fieldData['title'] ?>">
                                                                    <?php foreach( $fieldData['options'] as $fdOption ) { ?>
                                                                        <option value="<?= $fdOption['value'] ?>"<?= ( in_array($fdOption['value'], $selectedValues) ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif ( 'date' === $fieldData['type'] ) { ?>
                                                        <?php 
                                                            $dateValue = ('0000-00-00' !== $fieldData['value'] ? explode('-', $fieldData['value']) : null );
                                                            if ( !is_array($dateValue) || (3 !== count($dateValue)) ) {
                                                                $dateValue = null;
                                                            } 
                                                        ?>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-lg fa-fw"></i></span>
                                                                    <input type="text" class="form-control input-lg" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $dateValue ? "{$dateValue[2]}/{$dateValue[1]}/{$dateValue[0]}" : "" ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif ( 'time' === $fieldData['type'] ) { ?>
                                                        <?php 
                                                            $timeValue = ('00:00:00' !== $fieldData['value'] ? explode(':', $fieldData['value']) : null );
                                                            if ( !is_array($timeValue) || (3 !== count($timeValue)) ) {
                                                                $timeValue = null;
                                                            } 
                                                        ?>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-lg fa-fw"></i></span>
                                                                    <input type="text" class="form-control input-lg" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $timeValue ? "{$timeValue[0]}:{$timeValue[1]}:{$timeValue[2]}" : "" ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ( 1 === $ind % 2 ) { ?>
                                                    </div> <!-- row -->
                                                    <?php } ?>
                                                    
                                                <?php } ?>
                                                <?php if ( 0 !== count($stepData['fields']) % 2 ) { ?>
                                                    </div> <!-- row -->
                                                <?php } ?>
                                                </div> <!-- tab pane -->
                                            <?php } ?>
												
												<div class="form-actions">
													<div class="row">
														<div class="col-sm-12">
															<ul class="pager wizard no-margin">
																<li class="save">
                                                                    <button type="submit"  class="btn btn-lg txt-color-darken btn-save">Guardar y continuar</button>
                                                                    <input type="hidden" name="dg_id" value="<?= ($dgRecId ? $dgRecId : "") ?>" />
                                                                    <input type="hidden" name="post_action_step" value="<?= $currStepId ?>" />
                                                                    <input type="hidden" name="action" value="save" />
																</li>
															</ul>
														</div>
													</div>
												</div>
		
											</div> <!-- tab-content -->
										</div>
									</form >
                                <?php } ?>
								</div>
		
							</div>
							<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
		
					</div>
					<!-- end widget -->
		
				</article>
				<!-- WIDGET END -->
		
				<!-- NEW WIDGET START -->
				<article class="col-sm-12 col-md-12 col-lg-6">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-deletebutton="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
		
						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"
		
						-->
				
		
						</div>
						<!-- end widget div -->
		
					</div>
					<!-- end widget -->
		
				</article>
				<!-- WIDGET END -->
		
			</div>
		
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	// include page footer
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fuelux/wizard/wizard.min.js"></script>
		

<script type="text/javascript">
	$(document).ready(function() {
        $('#bootstrap-wizard-1').bootstrapWizard({
		    'tabClass': 'form-wizard',
            
		    'onTabClick': function (tab, navigation, index) {
                //$('#steps-form').submit();
                return false;
            }
        });
        /*$('.btn-save').on('click', function() {
            $('#steps-form').submit();
        });*/
	});
</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>