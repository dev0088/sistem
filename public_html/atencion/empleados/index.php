<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
    $page_title 	= "Expedientes";
    $page_css[] 	= "employees.css";
    $pageURL 		= APP_URL . 'atencion/empleados/index.php';
	$breadcrumbs["Atencion a Clientes"] = '';
    $page_nav["Atencion a Clientes"]['sub']["Empleados"]["active"] 	= true;
    include ("../../empleados/process-index.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
    include ("../../empleados/content-index.php");
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
        
		
        
        $('.btn-add-employee').on('click', function() {
            location.href = "<?= APP_URL ?>atencion/empleados/home.php?page=insert<?= isset($company_id) ? "&company_id=".$company_id : "" ?>";
        });
		
        $('.btn-edit-employee').on('click', function() {
            var 
                selectedCompanyId = $('.employee-row.selected:first').data('employeeId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>atencion/empleados/home.php?employee_id=" + selectedCompanyId + "&page=edit<?= isset($company_id) ? "&company_id=".$company_id : "" ?>";
            }
        });
		
		
		
        $('.btn-view-employee').on('click', function() {
            var 
                selectedCompanyId = $('.employee-row.selected:first').data('employeeId');
            if ( selectedCompanyId ) {
                location.href = "<?= APP_URL ?>atencion/empleados/home.php?employee_id=" + selectedCompanyId + "&page=view";
            }
        });
		
		
		
		
        $('.btn-remove-employee').on('click', function() {
            var 
                selectedCompanyId = $('.employee-row.selected:first').data('employeeId');
            
            if ( selectedCompanyId && confirm("Are you sure that you want to remove empleado?") ) 
			{
                $('#employee-details input[name="employee_id"]').val(selectedCompanyId);
                
                $('#employee-details form').submit();
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
        
        $('.employee-row').on('click', function() {
            var
                selectedEmployeeId = this.dataset['employeeId'];
            
            $('.employee-row').removeClass('selected');
            $('.employee-row[data-employee-id="' + selectedEmployeeId + '"]').addClass('selected');
			$('#generate_contract input[name="emp_id"]').val(selectedEmployeeId);
            $('.btn-edit-employee').removeClass('btn-default').addClass('btn-success');
            $('.btn-view-employee').removeClass('btn-default').addClass('btn-success');
            $('.btn-contract-employee').removeClass('btn-default').addClass('btn-success');
            $('.btn-remove-employee').removeClass('btn-default').addClass('btn-danger');
            $('.btn-contract-employee').attr('data-target','#contract-list-popup');	
        });
        
        $('#employee-details .close').on('click', function() {
            $('#employee-details').hide();
        });
        
		$('#employee-details .btn-close').on('click', function() {
            $('#employee-details').hide();
        });
        
		$('select.company-select').on('change', function() {
            var
                selectedCompanyId = $(this).val();
            if ( selectedCompanyId ) {
                companyId = parseInt(selectedCompanyId);
                location.href = generateURL(filters, 1); 
            }
        });
		
	/*****************************popups************************************/		
		
		var modalVerticalCenterClass = ".modal";
		function centerModals($element) {
			var $modals;
			if ($element.length) {
				$modals = $element;
			} else {
				$modals = $(modalVerticalCenterClass + ':visible');
			}
			$modals.each( function(i) {
				var $clone = $(this).clone().css('display', 'block').appendTo('body');
				var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
				top = top > 0 ? top : 0;
				$clone.remove();
				$(this).find('.modal-content').css("margin-top", top);
			});
		}
		$(modalVerticalCenterClass).on('show.bs.modal', function(e) {
			centerModals($(this));
		});
		$(window).on('resize', centerModals);		
		
        $('#start-exsist').on('click', function() 
		{
			$('#contract-popup').modal('hide');
			$('#contract-list-popup').modal('show');
        });
		
		
        $('.template-row').on('change', function() {
            var emp_id,
				employeeData	= $('.employee-row.selected:first').data('row'),
				temp_id			= $(this).val();
			
			emp_id 	= employeeData['id'];
			$('#generate_contract input[name="tmp_id"]').val(temp_id);
            $('#submit-data').removeClass('btn-default').addClass('btn-success');
		});		
		
        $('#submit-data').on('click', function() 
		{
			if($(this).hasClass('btn-success'))
			{
               $('#generate_contract').submit();
			}
			else
			{
				alert('Select one');
			}
        });
		
		
		
    });
</script>

<?php
    include ("../../inc-2/google-analytics.php");
?>