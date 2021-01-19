<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
    $page_css[] 	= "contactos.css";
    $pageURL 		= APP_URL . 'comercial/reportes/index.php';
	$breadcrumbs["Admin"] = '';
	
	if($signedUser['temp']['page'] == 1)
	{
		$page_title 	= "Ventas por plaza";
		$folder			= "vplaza";
		$page_nav["Comercial"]['sub']["Reportes"]['sub']["Vplaza"]["active"] 	= true;
	}
	elseif($signedUser['temp']['page'] == 2)
	{
		$page_title 	= "Actividad en cuentas";
		$folder			= "cuentas";
		$page_nav["Comercial"]['sub']["Reportes"]['sub']["Acuentas"]["active"] 	= true;
	}
	else
	{
		$page_title 	= "Pipeline";
		$folder			= "pipeline";
		$page_nav["Comercial"]['sub']["Reportes"]['sub']["Pipeline"]["active"] 	= true;
	}
	
	include ("../../reportes/".$folder."/process-index.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
    include ("../../reportes/".$folder."/content-index.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
<script src="<?php echo ASSETS_URL; ?>js/plugin/morris/raphael.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>js/plugin/morris/morris.min.js"></script>
<script type="text/javascript">
    var 
        filters 	= <?= JSON_Encode($filters) ?>,
        pageNum 	= <?= $pageNum ?>,
        sortBy 		= <?= ($sortBy ? JSON_Encode($sortBy) : 'null') ?>,
        url 		= "<?= $pageURL ?>";

    function generateURL(params, pageNum) {
        var 
            strURL = "<?= $pageURL ?>",
            strParams = "?";

        for( var key in params ) {
            if ( (null !== params[key]) && ('' !== params[key]) ) {
                strParams += (strParams.length > 1 ? '&' : '') + key + '=' + params[key];
            }
        }
        if ( 1 < pageNum ) {
            strParams += (strParams.length > 1 ? '&' : '') + 'page=' + pageNum;
        }
        
        if ( null !== sortBy ) {
            strParams += (strParams.length > 1 ? '&' : '') + 'sort_by=' + sortBy['field'] + '_' + sortBy['order'];
        }

        return strURL + (strParams.length > 1 ? encodeURI(strParams) : "");
    }

    $(document).ready(function() {
		
		if ($('#bar-graph-pipeline').length) {

			Morris.Bar({
				element : 'bar-graph-pipeline',
				data 	: <?php echo json_encode($arrJson); ?>,
				xkey 	: 'x',
				ykeys 	: ['y'],
				labels 	: ['Número de empresas'],
				barColors : function(row, series, type) {
						return '#0b62a4';
				}
			});

		}
		
		if ($('#bar-graph-vplaza').length) {

			Morris.Bar({

				element : 'bar-graph-vplaza',
				data 	: <?php echo json_encode($arrJson); ?>,
				xkey 	: 'x',
				ykeys 	: ['y', 'z'],
				labels 	: ['Numero de Trabajadores', 'Total de ventas'],
				xLabelAngle: 20

			});



		}
		
		
        $('.filter').on('change', function() {
            var 
                filter = this.dataset['field'],
                val = $(this).val();
            filters[filter] = val;
            
            location.href = generateURL(filters, pageNum);
        });
        
        $('.header-cols-labels th').on('click', function() {
            var
                field = this.dataset['field'],
                $el = $(this);
            if ( field ) {
                $('.header-cols-labels th:not([data-field="' + field + '"])')
                        .removeClass('sorting_asc')
                        .removeClass('sorting_desc')
                        .addClass('sorting');

                if ( $el.hasClass('sorting_asc') ) {
                    $el.removeClass('sorting_asc').addClass('sorting_desc');
                    sortBy = {'field': field, 'order': 'desc'};
                } else if ( $el.hasClass('sorting_desc') ) {
                    $el.removeClass('sorting_desc').addClass('sorting_asc');
                    sortBy = {'field': field, 'order': 'asc'};
                } else {
                    $el.removeClass('sorting').addClass('sorting_asc');
                    sortBy = {'field': field, 'order': 'asc'};
                }

                location.href = generateURL(filters, pageNum);
            }
        });
		
        $('.btn-detalle-estatus').on('click', function() {
            var 
                selectedCompanyId = $('.contacto-row.selected:first').data('estatusId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>comercial/reportes/home.php?estatus_id=" + selectedCompanyId + "&page=view";
            }
        });
        
        
        $('.contacto-row').on('click', function() {
            var
                selectedCompanyId = this.dataset['estatusId'];
            $('.contacto-row').removeClass('selected');
            $('.contacto-row[data-estatus-id="' + selectedCompanyId + '"]').addClass('selected');
            $('.btn-detalle-estatus').removeClass('btn-default').addClass('btn-success');
        });
        
    });
</script>

<?php
    include ("../../inc-2/google-analytics.php");
?>