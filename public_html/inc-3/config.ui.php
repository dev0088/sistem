<?php


/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_self",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);

$page_nav = array(); 

	if ( $signedUser && in_array($signedUser['role_id'], array(1, 2, 3, 4, 5, 6, 7, 10, 15)) ) 
	{
		$page_nav["Comercial"] = array(
				"title" => "Comercial",
				"icon" 	=> "fa-circle",
				"sub" 	=> array(
					"Empresas" 	=> array(
						"title" => "Empresas",
						"url" 	=> APP_URL . "comercial/empresas/home.php"
					),
					"Contactos" => array(
						"title" => "Contactos",
						"url" => APP_URL . "comercial/contactos/home.php"
					),
					"Citas" => array(
						"title" => "Citas",
						"sub" 	=> array(
							"Calendario" 	=> array(
								"title" => "Calendario",
								"url" => APP_URL . "comercial/citas/home.php",
							),
							"Consultar" => array(
								"title" => "Consultar",
								"url" 	=> APP_URL . "comercial/citas/home.php?page=list"
							)
						)
					),
					"Propuestas" => array(
						"title" => "Propuestas",
						"url" => "#",
						"sub" 	=> array(
							"Consultar" 	=> array(
								"title" => "Consultar",
								"url" 	=> APP_URL . "comercial/propuesta/home.php"
							),
							"Nueva propuesta" => array(
								"title" => "Nueva propuesta",
								"url" 	=> APP_URL . 'comercial/propuesta/home.php?page=insert'
							)
						)
					),
					"Empleados" => array(
						"title" => "Expedientes",
						"url" => APP_URL . "comercial/empleados/home.php"
					),
					"Reportes" => array(
						"title" => "Reportes",
						"url" => "#",
						"sub" 	=> array(
							"Semáforo" 	=> array(
								"title" => "Semáforo",
								"url" => APP_URL . "comercial/reportes/home.php?page=pipeline"
							),
							"Vplaza" => array(
								"title" => "Ventas por plaza.",
								"url" => APP_URL . "comercial/reportes/home.php?page=vplaza"
							),
							"Acuentas" => array(
								"title" => "Actividad en cuentas",
								"url" => APP_URL .'comercial/reportes/home.php?page=Acuentas'
							)
						)
					)
				)
			);
	}
	
	if ( $signedUser && in_array($signedUser['role_id'], array(1, 7, 10, 11)) ) 
	{
		$page_nav["Analisis"] = array(
				"title" => "An&aacute;lisis",
				"icon" => "fa-circle",
				"sub" => array(
					"Empresas" => array(
						"title" => "Empresas",
						"url" => APP_URL . "analisis/empresas/home.php"
					),
					"Propuestas" => array(
						"title" => "Propuestas",
						"url" => "#",
						"sub" 	=> array(
							"Consultar" 	=> array(
								"title" => "Consultar",
								"url" 	=> APP_URL . "analisis/propuesta/home.php"
							),
							"Nueva propuesta" => array(
								"title" => "Nueva propuesta",
								"url" 	=> APP_URL . 'analisis/propuesta/home.php?page=insert'
							)
						)
					)
				)
			);
	}
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(1, 7, 10, 12)) ) 
	{
		$page_nav["Atencion a Clientes"] = array(
				"title" => "Atenci&oacute;n a clientes",
				"icon" => "fa-circle",
				"sub" => array(
					"Empresas" => array(
						"title" => "Empresas",
						"url" => APP_URL . "atencion/empresas/home.php"
					)
				)
			);
	}
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(1, 7, 10, 13)) ) 
	{
		$page_nav["Juridico"] = array(
				"title" => "Juridico",
				"icon" => "fa-circle",
				"sub" => array(
					"Empresas" => array(
						"title" => "Empresas",
						"url" => APP_URL . "juridico/empresas/home.php"
					),
					"Contratos" => array(
						"title" => "Contratos",
						"url" => APP_URL . "juridico/contratos/home.php"
					)
				)
			);
	}
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(1, 7, 8, 10, 14)) ) 
	{
		$page_nav["Expedientes"] = array(
				"title" => "Implementación",
				"icon" => "fa-circle",
				"sub" => array(
					"Empresas" => array(
						"title" => "Empresas",
						"url" => APP_URL . "implementacion/empresas/home.php"
					),	
					"Expedientes" => array(
						"title" => "Expedientes.",
						"url" => APP_URL . 'implementacion/empleados/home.php'
					),
					"Nuevo expediente" => array(
						"title" => "Nuevo expediente",
						"url" => APP_URL . 'implementacion/empleados/home.php?page=insert'
					),
					"Cio" => array(
						"title" => "CIO",
						"url" => APP_URL . "implementacion/cio/home.php",
					),
					"Importar" => array(
						"title" => "Importar",
						"url" => APP_URL . "implementacion/importar/home.php"
					),			
					"Exportar" 	=> array(
						"title" => "Exportar",
						"url" => APP_URL . "implementacion/exportar/home.php"
					)
				)
			);
	}
	
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(8)) ) 
	{
		$page_nav["Usuarios"] = array(
				"title" => "Admin",
				"icon" => "fa-user",
				"sub" => array(
					"Usuarios" => array(
						"title" => "Usuarios",
						"url" => APP_URL ."admin/usuarios/home.php"
					),
					"Add User" => array(
						"title" => "Agregar usuario",
						"url" => APP_URL . 'admin/usuarios/home.php?page=insert'
					)
				)
			);
	}

	
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(1, 7, 10)) ) 
	{
		$page_nav["Usuarios"] = array(
				"title" => "Admin",
				"icon" => "fa-user",
				"sub" => array(
					"Usuarios" => array(
						"title" => "Usuarios",
						"url" => APP_URL ."admin/usuarios/home.php"
					),
					"Add User" => array(
						"title" => "Agregar usuario",
						"url" => APP_URL . 'admin/usuarios/home.php?page=insert'
					),
					"Facturadoras" => array(
						"title" => "Facturadoras",
						"url" => APP_URL ."admin/facturadoras/home.php"
					),
					"Plazas" => array(
						"title" => "Plazas",
						"url" => APP_URL ."admin/plazas/home.php"
					),
					"Suministradoras" => array(
						"title" => "Suministradoras",
						"url" => APP_URL ."admin/suministradoras/home.php"
					),
					"Salarios" => array(
						"title" => "Salarios Minimos profesionales",
						"url" => APP_URL ."admin/salarios/home.php"
					)
				)
			);
	}


	if ( $signedUser && in_array($signedUser['role_id'], array(9)) ) 
	{
		$page_nav["Expedientes"] = array(    
				"title" => "Implementación",
				"icon" 	=> "fa-circle",
				"sub" 	=> array(
					"Expedientes" => array(
						"title" => "Expedientes",
						"url" => APP_URL . 'implementacion/empleados/home.php'
					),
					"Nuevo expediente" => array(
						"title" => "Nuevo expediente",
						"url" => APP_URL . 'implementacion/empleados/home.php?page=insert'
					)
				)
			);
	}
	

	

	//configuration variables
	$page_title 	= "";
	$page_css 		= array();
	$no_main_header = false; //set true for lock.php and login.php
	$page_body_prop = array(); //optional properties for <body>
	$page_html_prop = array(); //optional properties for <html>
?>