<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
/**********************************************  PAGE SPECIFICS  ************************************************/
    $page_title 		= "Empresas";
    $page_css[] 		= "companies.css";
    $pageURL 			= APP_URL . 'implementacion/empresas/index.php';
	$breadcrumbs["Implementacion"] = APP_URL . 'implementacion/empresas/home.php';
    $page_nav["Expedientes"]["sub"]["Empresas"]["active"] = true;
	
	include ("../../empresas/process-index.php");
	include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../empresas/content-index.php");
?>
<script type="text/javascript">
    var 
        filters = <?= JSON_Encode($filters) ?>,
        pageNum = <?= $pageNum ?>,
        sortBy = <?= ($sortBy ? JSON_Encode($sortBy) : 'null') ?>,
        url = "<?= $pageURL ?>";

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
        $('.filter').on('change', function() {
            var 
                filter = this.dataset['field'],
                val = $(this).val();
            filters[filter] = val;
            
            location.href = generateURL(filters, pageNum);
        });
        
        $('.btn-add-company').on('click', function() {
            location.href = "<?= APP_URL ?>implementacion/empresas/home.php?page=insert";
        });
		
		
        $('.btn-view-company').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/empresas/home.php?company_id=" + selectedCompanyId + "&page=detail";
            }
        });
		

        $('.btn-edit-company').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/empresas/home.php?company_id=" + selectedCompanyId + "&page=edit";
            }
        });
		
		
		
        $('.btn-estatus-company').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/empresas/home.php?company_id=" + selectedCompanyId + "&page=status";
            }
        });
		
        $('.btn-company-contactos').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/contactos/home.php?company_id=" + selectedCompanyId;
            }
        });
		
        $('.btn-company-citas').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/citas/home.php?company_id=" + selectedCompanyId;
            }
        });
		
        $('.btn-company-propuestas').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/propuesta/home.php?company_id=" + selectedCompanyId;
            }
        });
		
		
        $('.btn-company-employees').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>implementacion/empleados/home.php?company_id=" + selectedCompanyId;
            }
        });
		
		
		
		
		
        $('.btn-remove-company').on('click', function() {
            var 
                selectedCompanyId = $('.company-row.selected:first').data('companyId');
            
            if ( selectedCompanyId && confirm("Are you sure that you want to remove company?") ) {
                $('#company-details input[name="company_id"]').val(selectedCompanyId);
                $('#company-details input[name="action"]').val('remove');
                
                $('#company-details form').submit();
            }
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
        
        $('.company-row').on('click', function() {
            var
                selectedCompanyId = this.dataset['companyId'];
            
            $('.company-row').removeClass('selected');
            $('.company-row[data-company-id="' + selectedCompanyId + '"]').addClass('selected');
            
            $('.btn-edit-company').removeClass('btn-default').addClass('btn-success');
            $('.btn-view-company').removeClass('btn-default').addClass('btn-success');
            $('.btn-remove-company').removeClass('btn-default').addClass('btn-danger');
            $('.btn-estatus-company').removeClass('btn-default').addClass('btn-success');
        });
        
        $('#company-details .close').on('click', function() {
            $('#company-details').hide();
        });
        $('#company-details .btn-close').on('click', function() {
            $('#company-details').hide();
        });
        
    });
</script>

<?php
    include ("../../inc-2/google-analytics.php");
?>