<?php

    $fichero = file_get_contents('./Certificado/AAA010101AAA.pfx', true);
	$wsdl = "http://wcfpruebas.facturoporti.com.mx/Timbrado/Servicios.svc?wsdl";
    
	$soapClient = new SoapClient($wsdl); 
	//Envia las credenciales de acceso
	$parametroSeguridad = array ('Usuario' => 'PruebasTimbrado','Contrasenia' => '@Notiene1');
	// Agrega los parametros para cancelar uno o varios UUID
	$parametro = array ('RFC' =>  'AAA010101AAA', 'PFX' => $fichero, 'Password' => '12345678a', 'UUID' => array('a510d8e9-5f21-4e3c-8a04-6d65ac4ef174', 'd55e6169-f221-4bd7-8fe6-2bf0a12a1f69'));
	
	$retval = $soapClient->CancelarCFDICualquierPAC(array ('parametroSeguridad' => $parametroSeguridad,'parametro' => $parametro));
		
	print_r ($retval->CancelarCFDICualquierPACResult->FoliosRespuesta);
	
?>