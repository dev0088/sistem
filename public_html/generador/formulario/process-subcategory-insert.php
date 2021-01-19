<?php
	$postActionErrorMsg = $postActionNotificationMsg = $postAction = $postActionStep = $companeyId = $employeeId = $currrent_step_totalcost = $prev_step_totalcost = $mngtotal = null;
		
	
	function validaRFC($valor) 
	{
		$valor = str_replace("-", "", $valor);
		$valor = str_replace(" ", "", $valor);
		$cuartoValor = substr($valor, 3, 1);
		//RFC Persona Moral.
		if (ctype_digit($cuartoValor) && strlen($valor) == 12) {
			$letras = substr($valor, 0, 3);
			$numeros = substr($valor, 3, 6);
			$homoclave = substr($valor, 9, 3);
			if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) {
				return true;
			}
		//RFC Persona Física.
		} else if (ctype_alpha($cuartoValor) && strlen($valor) == 13) {
			$letras = substr($valor, 0, 4);
			$numeros = substr($valor, 4, 6);
			$homoclave = substr($valor, 10, 3);
			if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) {
				return true;
			}
		}else {
			return false;
		}
	}
	
	
	function verify_time_format($value)
	{
	  $pattern1 = '/^(0?\d|1\d|2[0-3]):[0-5]\d:[0-5]\d$/';
	  $pattern2 = '/^(0?\d|1[0-2]):[0-5]\d\s(am|pm)$/i';
	  return preg_match($pattern1, $value) || preg_match($pattern2, $value);
	}	
    
    
    
	function validate_curp($valor){
     if(strlen($valor)==18){       
        $letras     = substr($valor, 0, 4);
        $numeros    = substr($valor, 4, 6);        
        $sexo       = substr($valor, 10, 1);
        $mxState    = substr($valor, 11, 2);
        $letras2    = substr($valor, 13, 3);
        $homoclave  = substr($valor, 16, 2);
        if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && is_mx_state($mxState) && is_sexo_curp($sexo)){
            return true;
        }        
		return false;
		}
		else{
			return false;
		}
	}
	
	function is_mx_state($state){   
		$mxStates = array(        
			'AS','BS','CL','CS','DF','GT',       
			'HG','MC','MS','NL','PL','QR',        
			'SL','TC','TL','YN','NE','BC',        
			'CC','CM','CH','DG','GR','JC',        
			'MN','NT','OC','QT','SP','SR',        
			'TS','VZ','ZS'    
		);   
		if(in_array(strtoupper($state),$mxStates)){        
			return true;    
		}   
		return false;
	}
	
	
	
	function is_sexo_curp($sexo){    
		$sexoCurp = array('H','M');    
		if(in_array(strtoupper($sexo),$sexoCurp)){       
		   return true;  
		}    
		return false;
	}
		
		
	if (isset($_SESSION['logged_in']))
	{
		$signedUser = $_SESSION['logged_in'];
		$rolId		= $signedUser['role_id'];
		$employeeId	= $signedUser['employee_id'];
		$userId		= $signedUser['id'];
		$companeyId	= $signedUser['client_id'];
	}
	else
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
	$converter 	= new Encryption;
	
	
	if(isset($_POST['action']))
	{//$_POST();die;
		$postAction 	= $_POST['action'];
		$Categories 	= $_POST['Categories'];
		$subcategory 	= $_POST['subcategory'];
		$price 	= $_POST['price'];
//$_POST();die;
		$continue 		= $arrEmployee = $arrEstado = $arrCio = $cioListRes = array();
		$stepPostData 	= array();
		
		
			$sql="select * from subcategories where (subcategory_name='$subcategory');";
      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($subcategory==isset($row['subcategory_name']))
        {
            	$postActionNotificationMsg 	= "subcategory_name already added";

        }
	
		}
else{
	
	$query 		= "INSERT INTO `subcategories`(`Categories`, `subcategory_name`, `price`) VALUES ('$Categories','$subcategory','$price') ";
		$queryRes 	= $conn->query($query);
		if ($queryRes) 
		{			
			$postActionNotificationMsg 	= "formar agregado exitosamente";
			// header("Location: formar.php");	
		} 
		else 
		{
			$postActionErrorMsg 	= "Failed to submit : " . mysqli_error($conn);
			// $currStepId 			= $postActionStep;
		}
    
}


		
		
		
	
	}
	
	
	
