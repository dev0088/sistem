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
// print_r("hh");die; 
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
								"url" => APP_URL . "comercial/reportes/home.php?page=semaforo"
							),
							"Vplaza" => array(
								"title" => "Ventas por plaza",
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
				"title" => "Generador",
				"icon" => "fa-circle",
				"sub" => array(
					"Empresas" => array(
						"title" => "Empresas",
						"url" => APP_URL . "generador/empresas/home.php"
					),	
				// 	"Expedientes" => array(
				// 		"title" => "Archivos generados",
				// 		"url" => APP_URL . 'generador/formulario/home.php'
				// 	),
				// 	"Nuevo expediente" => array(
				// 		"title" => "Nuevo generador",
				// 		"url" => APP_URL . 'generador/formulario/home.php?page=insert'
				// 	)  ,
					
						"formar" => array(
						"title" => "New file",
						"url" => APP_URL . 'generador/formulario/home.php?page=formar'
					) , 
						
						"Formar Archivos" => array(
						"title" => "See files generated",
						"url" => APP_URL . 'generador/formulario/home.php?page=formar-archivos'
					) , 
					
						
						"Subcategory" => array(
						"title" => "Catalog",
						"url" => APP_URL . 'generador/formulario/home.php?page=subcategory'
					) , 
					
					
					/*
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
					)*/
				)
			);
	}
	
	
	
	if ( $signedUser && in_array($signedUser['role_id'], array(9)) ) 
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

/*
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
	
*/
	
	/*
		$page_nav["dashboard"] = array(
				"title" => "Dashboard",
				"icon" => "fa-home",
				"sub" => array(
					"analytics" => array(
						"title" => "Analytics Dashboard",
						"url" => APP_URL
					),
					"social" => array(
						"title" => "Social Wall",
						"url" => APP_URL."dashboard-social.php"
					)
				)
			);
		$page_nav["smartui"] = array(
				"title" => "Smart UI",
				"icon" => "fa-code",
				"sub" => array(
					"general" => array(
						'title' => 'General Elements',
						'icon' => 'fa-folder-open',
						'sub' => array(
							'alert' => array(
								'title' => 'Alerts',
								'url' => APP_URL."smartui-alert.php"
							),
							'progress' => array(
								'title' => 'Progress',
								'url' => APP_URL.'smartui-progress.php'
							)
						)
					),
					"carousel" => array(
						"title" => "Carousel",
						"url" => APP_URL.'smartui-carousel.php'
					),
					"tab" => array(
						"title" => "Tab",
						"url" => APP_URL.'smartui-tab.php'
					),
					"accordion" => array(
						"title" => "Accordion",
						"url" => APP_URL.'smartui-accordion.php'
					),
					"widget" => array(
						'title' => "Widget",
						'url' => APP_URL."smartui-widget.php"
					),
					"datatable" => array(
						"title" => "DataTable",
						"url" => APP_URL."smartui-datatable.php"
					),
					"button" => array(
						"title" => "Button",
						"url" => APP_URL."smartui-button.php"
					),
					'smartform' => array(
						'title' => 'Smart Form',
						'url' => APP_URL.'smartui-form.php'
					)
				)
			);

		$page_nav["smartint"] = array(
				"title" => "SmartAdmin Intel",
				"icon" => "fa-cube txt-color-blue",
				"sub" => array(
					"layouts" => array(
						"title" => "App Layouts",
						"icon" => "fa-gear",
						"url" => APP_URL."layouts.php"
					),
					"skins" => array(
						"title" => "Prebuilt Skins",
						"icon" => "fa-picture-o",
						"url" => APP_URL."skins.php"
					),
					"applayout" => array(
						"title" => "App Settings",
						"icon" => "fa-cube",
						"url" => APP_URL."applayout.php"
					)
				)
			);

		$page_nav["outlook"] = array(
				"title" => "Outlook",
				"icon" => "fa-inbox",
				"label_htm" => '<span class="badge pull-right inbox-badge margin-right-13">14</span>',
				"sub" => array(
					"email_inbox" => array(
						"title" => "Inbox",
						"url" => APP_URL."/inbox.php"
					),
					"email_view" => array(
						"title" => "Email view",
						"url" => APP_URL."/inbox-email-view.php"
					),
					"email_compose" => array(
						"title" => "Compose",
						"url" => APP_URL."/inbox-email-compose.php"
					),
					"email_reply" => array(
						"title" => "Reply",
						"url" => APP_URL."/inbox-email-reply.php"
					),
					"email_template" => array(
						"title" => "Email Templates",
						"url" => APP_URL."/email-template.php"
					)
				)
			);

		$page_nav["graphs"] = array(
				"title" => "Graphs",
				"icon" => "fa-bar-chart-o",
				"sub" => array(
					"flot" => array(
						"title" => "Flot Chart",
						"url" => APP_URL."/flot.php"
					),
					"morris" => array(
						"title" => "Morris Charts",
						"url" => APP_URL."/morris.php"
					),
					"sparklines" => array(
						"title" => "Sparklines",
						"url" => APP_URL."/sparkline-charts.php"
					),
					"easypie" => array(
						"title" => "EasyPieCharts",
						"url" => APP_URL."/easypie-charts.php"
					),
					"dygraphs" => array(
						"title" => "Dygraphs",
						"url" => APP_URL."/dygraphs.php",
					),
					"chartjs" => array(
						"title" => "Chart.js",
						"url" => APP_URL."/chartjs.php"
					),
					"highchart" => array(
						"title" => "HighchartTable",
						"url" => APP_URL."/hchartable.php",
						"label_htm" => ' <span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
					)
				)
			);

		$page_nav["tables"] = array(
				"title" => "Tables",
				"icon" => "fa-table",
				"sub" => array(
					"normal" => array(
						"title" => "Normal Tables",
						"url" => APP_URL."/table.php"
					),
					"data" => array(
						"title" => "Data Tables",
						"url" => APP_URL."/datatables.php",
						"label_htm" => ' <span class="badge inbox-badge bg-color-greenLight">responsive</span>'
					),
					"jqgrid" => array(

						"title" => "Jquery Grid",
						"url" => APP_URL."/jqgrid.php"
					)
				)
			);

		$page_nav["forms"] = array(
				"title" => "Forms",
				"icon" => "fa-pencil-square-o",
				"sub" => array(
					"smart_elements" => array(
						"title" => "Smart Form Elements",
						"url" => APP_URL."/form-elements.php"
					),
					"smart_layout" => array(
						"title" => "Smart Form Layouts",
						"url" => APP_URL."/form-templates.php"
					),
					"smart_validation" => array(
						"title" => "Smart Form Validation",
						"url" => APP_URL."/validation.php"
					),
					"bootstrap_forms" => array(
						"title" => "Bootstrap Form Elements",
						"url" => APP_URL."/bootstrap-forms.php"
					),
					"form_plugins" => array(
						"title" => "Form Plugins",
						"url" => APP_URL."/plugins.php"
					),
					"wizards" => array(
						"title" => "Wizards",
						"url" => APP_URL."/wizard.php"
					),
					"bootstrap_editors" => array(
						"title" => "Bootstrap Editors",
						"url" => APP_URL."/other-editors.php"
					),
					"dropzone" => array(
						"title" => "Dropzone",
						"url" => APP_URL."/dropzone.php"
					),
					"imagecrop" => array(
						"title" => "Image Cropping",
						"url" => APP_URL."/image-editor.php"
					),
					"ck_editor" => array(
						"title" => "CK Editor",
						"url" => APP_URL."/ckeditor.php"
					)
				)
			);

		$page_nav["ui_elements"] = array(
				"title" => "UI Elements",
				"icon" => "fa-desktop",
				"sub" => array(
					"general" => array(
						"title" => "General Elements",
						"url" => APP_URL."/general-elements.php"
					),
					"buttons" => array(
						"title" => "Buttons",
						"url" => APP_URL."/buttons.php"
					),
					"icons" => array(
						"title" => "Icons",
						"sub" => array(
							"fa" => array(
								"title" => "Font Awesome",
								"icon" => "fa-plane",
								"url" => APP_URL."/fa.php"
							),
							"glyph" => array(
								"title" => "Glyph Icons",
								"icon" => "fa-plane",
								"url" => APP_URL."/glyph.php"
							),
							"flags" => array(
								"title" => "Flags",
								"icon" => "fa-flag",
								"url" => APP_URL."/flags.php"
							)
						)
					),
					"grid" => array(
						"title" => "Grid",
						"url" => APP_URL."/grid.php"
					),
					"tree_view" => array(
						"title" => "Tree View",
						"url" => APP_URL."/treeview.php"
					),
					"nestable_lists" => array(
						"title" => "Nestable Lists",
						"url" => APP_URL."/nestable-list.php"
					),
					"jquery_ui" => array(
						"title" => "jQuery UI",
						"url" => APP_URL."/jqui.php"
					),
					"typo" => array(
						"title" => "Typography",
						"url" => APP_URL."/typography.php"
					),
					"nav6" => array(
						"title" => "Six Level Menu",
						"sub" => array(
							"second_lvl" => array(
								"title" => "Item #2",
								"icon" => "fa-folder-open",
								"sub" => array(
									"third_lvl" => array(
										"title" => "Sub #2.1",
										"icon" => "fa-folder-open",
										"sub" => array(
											"file" => array(
												"title" => "Item #2.1.1",
												"icon" => "fa-file-text"
											),
											"fourth_lvl" => array(
												"title" => "Expand",
												"icon" => "fa-plus",
												"sub" => array(
													"file" => array(
														"title" => "File",
														"icon" => "fa-file-text"
													),
													"fifth_lvl" => array(
														"title" => "Delete",
														"icon" => "fa-trash-o"
													)
												)
											)
										)
									)
								)
							),
							"folder" => array(
								"title" => "Item #3",
								"icon" => "fa-folder-open",
								"sub" => array(
									"third_lvl" => array(
										"title" => "Sub #3.1",
										"icon" => "fa-folder-open",
										"sub" => array(
											"file1" => array(
												"title" => "File",
												"icon" => "fa-file-text"
											),
											"file2" => array(
												"title" => "File",
												"icon" => "fa-file-text"
											)
										)
									)
								)
							),
							"disabled" => array(
								"title" => "Item #4 (disabled)",
								"class" => "inactive",
								"icon" => "fa-folder-open"
							)
						)
					),
				)
			);

		$page_nav["widgets"] = array(
				"title" => "Widgets",
				"url" => APP_URL."/widgets.php",
				"icon" => "fa-list-alt"
			);

		$page_nav["cool"] = array(
				"title" => "Cool Features!",
				"icon" => "fa-cloud",
				"icon_badge" => "3",
				"sub" => array(
					"cal" => array(
						"title" => "Calendar",
						"url" => APP_URL."/calendar.php",
						"icon" => "fa-calendar"
					),
					"gmap_skins" => array(
						"title" => "GMap Skins",
						"url" => APP_URL."/gmap-xml.php",
						"icon" => "fa-map-marker",
						"label_htm" => '<span class="badge bg-color-greenLight pull-right inbox-badge">9</span>'
					)
				)

			);

		$page_nav["views"] = array(
				"title" => "App Views",
				"icon" => "fa-puzzle-piece",
				"sub" => array(
					"projects" => array(
						"title" => "Projects",
						"icon" => "fa fa-file-text-o",
						"url" => APP_URL."/projects.php"
					),
					"blog" => array(
						"title" => "Blog",
						"icon" => "fa fa-paragraph",
						"url" => APP_URL."/blog.php"
					),
					"gallery" => array(
						"title" => "Gallery",
						"icon" => "fa fa-picture-o",
						"url" => APP_URL."/gallery.php"
					),
					"forum" => array(
						"title" => "Forum Layout",
						"icon" => "fa fa-comments",
						"sub" => array(
							"general" => array(
								"title" => "General View",
								"url" => APP_URL."/forum.php"
							),
							"topic" => array(
								"title" => "Topic View",
								"url" => APP_URL."/forum-topic.php"
							),
							"post" => array(
								"title" => "Post View",
								"url" => APP_URL."/forum-post.php"
							),
						)
					),
					"profile" => array(
						"title" => "Profile",
						"icon" => "fa fa-group",
						"url" => APP_URL."/profile.php"
					),
					"timeline" => array(
						"title" => "Timeline",
						"icon" => "fa fa-clock-o",
						"url" => APP_URL."/timeline.php"
					),
					"search" => array(
						"title" => "Search Page",
						"icon" => "fa fa-search",
						"url" => APP_URL."/search.php"
					),
				)
			);

		$page_nav["ecommerce"] = array(
				"title" => "E-Commerce",
				"icon" => "fa-shopping-cart",
				"sub" => array(
					"orders" => array(
						"title" => "Orders",
						"url" => APP_URL."/orders.php"
					),
					"prod-view" => array(
						"title" => "Products View",
						"url" => APP_URL."/products-view.php"
					),
					"prod-detail" => array(
						"title" => "Products Detail",
						"url" => APP_URL."/products-detail.php"
					)
				)
			);

		$page_nav["misc"] = array(
				"title" => "Miscellaneous",
				"icon" => "fa-windows",
				"sub" => array(
					"landing_page" => array(
						"title" => 'Landing Page',
						"title_append" => '<i class="fa fa-external-link"></i>',
						"url" => "http://bootstraphunter.com/smartadmin-landing/",
						"url_target"=> "_blank"
					),
					"pricing_tables" => array(
						"title" => "Pricing Tables",
						"url" => APP_URL."/pricing-table.php"
					),
					"invoice" => array(
						"title" => "Invoice",
						"url" => APP_URL."/invoice.php"
					),
					"login" => array(
						"title" => "Login",
						"url" => APP_URL."/login.php"
					),
					"register" => array(
						"title" => "Register",
						"url" => APP_URL."/register.php"
					),
					"forgot" => array(
						"title" => "Forgot Password",
						"url" => APP_URL."/forgotpassword.php"
					),
					"lock" => array(
						"title" => "Locked Screen",
						"url" => APP_URL."/lock.php"
					),
					"err_404" => array(
						"title" => "Error 404",
						"url" => APP_URL."/error404.php"
					),
					"err_500" => array(
						"title" => "Error 500",
						"url" => APP_URL."/error500.php"
					),
					"blank" => array(
						"title" => "Blank Page",
						"url" => APP_URL."/blank_.php"
					),
					"email_template" => array(
						"title" => "Email Template",
						"url" => APP_URL."/email-template.php"
					)
				)
			);

		$page_nav["smartchat"] = array(
				"title" => "Smart Chat API <sup>beta</sup>",
				"icon" => "fa fa-lg fa-fw fa-comment-o",
				"icon_badge" => array(
					'content' => '!',
					'class' => 'bg-color-pink flash animated'
				),
				"li_class" => array("chat-users", "top-menu-invisible"),
				"sub" => '
					<div class="display-users">
						<input class="form-control chat-user-filter" placeholder="Filter" type="text">

						<a href="#" class="usr" 
							data-chat-id="cha1" 
							data-chat-fname="Sadi" 
							data-chat-lname="Orlaf" 
							data-chat-status="busy" 
							data-chat-alertmsg="Sadi Orlaf is in a meeting. Please do not disturb!" 
							data-chat-alertshow="true" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/5.png\' alt=\'Sadi Orlaf\'>
									<div class=\'usr-card-content\'>
										<h3>Sadi Orlaf</h3>
										<p>Marketing Executive</p>
									</div>
								</div>
							"> 
							<i></i>Sadi Orlaf
						</a>

						<a href="#" class="usr" 
							data-chat-id="cha2" 
							data-chat-fname="Jessica" 
							data-chat-lname="Dolof" 
							data-chat-status="online" 
							data-chat-alertmsg="" 
							data-chat-alertshow="false" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/1.png\' alt=\'Jessica Dolof\'>
									<div class=\'usr-card-content\'>
										<h3>Jessica Dolof</h3>
										<p>Sales Administrator</p>
									</div>
								</div>
							"> 
							<i></i>Jessica Dolof
						</a>

						<a href="#" class="usr" 
							data-chat-id="cha3" 
							data-chat-fname="Zekarburg" 
							data-chat-lname="Almandalie" 
							data-chat-status="online" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/3.png\' alt=\'Zekarburg Almandalie\'>
									<div class=\'usr-card-content\'>
										<h3>Zekarburg Almandalie</h3>
										<p>Sales Admin</p>
									</div>
								</div>
							"> 
							<i></i>Zekarburg Almandalie
						</a>

						<a href="#" class="usr" 
							data-chat-id="cha4" 
							data-chat-fname="Barley" 
							data-chat-lname="Krazurkth" 
							data-chat-status="away" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/4.png\' alt=\'Barley Krazurkth\'>
									<div class=\'usr-card-content\'>
										<h3>Barley Krazurkth</h3>
										<p>Sales Director</p>
									</div>
								</div>
							"> 
							<i></i>Barley Krazurkth
						</a>

						<a href="#" class="usr offline" 
							data-chat-id="cha5" 
							data-chat-fname="Farhana" 
							data-chat-lname="Amrin" 
							data-chat-status="incognito" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/female.png\' alt=\'Farhana Amrin\'>
									<div class=\'usr-card-content\'>
										<h3>Farhana Amrin</h3>
										<p>Support Admin <small><i class=\'fa fa-music\'></i> Playing Beethoven Classics</small></p>
									</div>
								</div>
							"> 
							<i></i>Farhana Amrin (offline)
						</a>

						<a href="#" class="usr offline" 
							data-chat-id="cha6" 
							data-chat-fname="Lezley" 
							data-chat-lname="Jacob" 
							data-chat-status="incognito" 
							data-rel="popover-hover" 
							data-placement="right" 
							data-html="true" 
							data-content="
								<div class=\'usr-card\'>
									<img src=\'img/avatars/male.png\' alt=\'Lezley Jacob\'>
									<div class=\'usr-card-content\'>
										<h3>Lezley Jacob</h3>
										<p>Sales Director</p>
									</div>
								</div>
							"> 
							<i></i>Lezley Jacob (offline)
						</a>

						<a href="ajax/chat.php" class="btn btn-xs btn-default btn-block sa-chat-learnmore-btn">About the API</a>
					</div>'
			);
	*/
	//configuration variables
	$page_title 	= "";
	$page_css 		= array();
	$no_main_header = false; //set true for lock.php and login.php
	$page_body_prop = array(); //optional properties for <body>
	$page_html_prop = array(); //optional properties for <html>
?>