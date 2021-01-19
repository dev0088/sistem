<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
    $page_title 	= "Usuarios";
    $page_css[] 	= "usuarios.css";
    $page_nav["Usuarios"]["sub"]["Usuarios"]["active"] 	= true;
    $pageURL 		= APP_URL . 'admin/usuarios/index.php';
	$breadcrumbs["Usuarios"] = "";
	
	include ("../../usuarios/process-index.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
    include ("../../usuarios/content-index.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
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
        
		
		
        $('.btn-add-user').on('click', function() {
            location.href = "<?= APP_URL ?>admin/usuarios/home.php?page=insert";
        });
		
		
		
        $('.btn-edit-user').on('click', function() {
            var 
                selectedCompanyId = $('.user-row.selected:first').data('companyId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>admin/usuarios/home.php?user_id=" + selectedCompanyId + "&page=edit";
            }
        });
		
		
		
        $('.btn-remove-user').on('click', function() {
            var 
                selectedCompanyId = $('.user-row.selected:first').data('companyId');
            
            if ( selectedCompanyId && confirm("Are you sure that you want to remove user?") ) 
			{
                $('#user-details input[name="company_id"]').val(selectedCompanyId);
                $('#user-details input[name="action"]').val('remove');
                
                $('#user-details form').submit();
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
        
		
		
        $('.user-row').on('click', function() {
            var
                selectedCompanyId = this.dataset['companyId'];
            
            $('.user-row').removeClass('selected');
            $('.user-row[data-company-id="' + selectedCompanyId + '"]').addClass('selected');
            
            $('.btn-edit-user').removeClass('btn-default').addClass('btn-success');
            $('.btn-remove-user').removeClass('btn-default').addClass('btn-danger');
        });
        
        $('#user-details .close').on('click', function() {
            $('#user-details').hide();
        });
        $('#user-details .btn-close').on('click', function() {
            $('#user-details').hide();
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