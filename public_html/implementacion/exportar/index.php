<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
	
	$page_title 	= "Exportar";
	$page_css[] 	= "employees.css";
	$pageURL 		= APP_URL . 'implementacion/exportar/index.php';
	$breadcrumbs["Implementacion"] = '';
	$page_nav["Expedientes"]['sub']["Exportar"]["active"] 	= true;
	
	
	include ("../../exportar/process-index.php");
	include ("../../inc-2/header.php");
	include ("../../inc-2/nav.php");
	include ("../../exportar/content-index.php");
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
		
        $('.employee-row').on('click', function() {

            if($(this).hasClass('selected')){
            		$(this).removeClass('selected');
					$(this).find('input').prop("checked", "");
					$('.all_emp_id').prop("checked", "");
					if($('.emp_id:checked').length < 1){
							$('.btn-export-employee').removeClass('btn-success').addClass('btn-default');
						}
			}
			else{
				$(this).addClass('selected');
				$(this).find('input').prop("checked", "checked");
				$('.btn-export-employee').removeClass('btn-default').addClass('btn-success');
				if($('.emp_id:not(:checked)').length == 0){
					$('.all_emp_id').prop("checked", "checked");
				}	
			}
			
        });
		
        $('.all_emp_id').on('click', function() {
			if($(this).is(":checked"))
			{
				$('.employee-row').find('input').prop("checked", "checked");
				$('.employee-row').removeClass('selected').addClass('selected');
				$('.btn-export-employee').removeClass('btn-default').addClass('btn-success');
			}
			else
			{
				$('.employee-row').find('input').prop("checked", "");
				$('.employee-row').removeClass('selected');
				$('.btn-export-employee').removeClass('btn-success').addClass('btn-default');
			}
		});
		
		
		
        $('body').on('click', '.btn-success', function() {
			
			$("#emp_form").submit();
        });
    });
</script>

<?php
    include ("../../inc-2/google-analytics.php");
?>