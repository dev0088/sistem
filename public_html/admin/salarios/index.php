<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
    $page_title 	= "Salarios Minimos profesionales";
    $page_css[] 	= "contactos.css";
    $pageURL 		= APP_URL . 'admin/salarios/index.php';
	$breadcrumbs["Admin"] = '';
    $page_nav["Usuarios"]['sub']["Salarios"]["active"] 	= true;
    
	include ("../../salarios/process-index.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
    include ("../../salarios/content-index.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>

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
		
        $('.filter').on('change', function() {
            var 
                filter = this.dataset['field'],
                val = $(this).val();
            filters[filter] = val;
            
            location.href = generateURL(filters, pageNum);
        });
        
        $('.btn-add-contacto').on('click', function() {
            location.href = "<?= APP_URL ?>admin/salarios/home.php?page=insert<?= isset($company_id) ? "&company_id=".$company_id : "" ?>";
        });
		
        $('.btn-edit-contacto').on('click', function() {
            var 
                selectedCompanyId = $('.contacto-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>admin/salarios/home.php?contacto_id=" + selectedCompanyId + "&page=edit<?= isset($company_id) ? "&company_id=".$company_id : "" ?>";
            }
        });
		
		
		
        $('.btn-remove-contacto').on('click', function() {
            var 
                selectedCompanyId = $('.contacto-row.selected:first').data('companyId');
            
            if ( selectedCompanyId && confirm("Are you sure that you want to remove plaza?") ) 
			{
                $('#contacto-details input[name="salary_wage_id"]').val(selectedCompanyId);
                $('#contacto-details input[name="action"]').val('remove');
                
                $('#contacto-details form').submit();
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
        
        $('.contacto-row').on('click', function() {
            var
                selectedCompanyId = this.dataset['companyId'];
            
            $('.contacto-row').removeClass('selected');
            $('.contacto-row[data-company-id="' + selectedCompanyId + '"]').addClass('selected');
            
            $('.btn-edit-contacto').removeClass('btn-default').addClass('btn-success');
            $('.btn-remove-contacto').removeClass('btn-default').addClass('btn-danger');
        });
        
        $('#contacto-details .close').on('click', function() {
            $('#contacto-details').hide();
        });
		
        $('#contacto-details .btn-close').on('click', function() {
            $('#contacto-details').hide();
        });
        
        $('.btn-company-employees').on('click', function() {
            var 
                companyId = this.dataset['companyId'];
            
            if ( companyId ) {
                location.href = "<?= APP_URL ?>employees.php?company_id=" + companyId;
            }
        });
    });
</script>

<?php
    include ("../../inc-2/google-analytics.php");
?>