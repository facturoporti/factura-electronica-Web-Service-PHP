<?php

	$fichero = file_get_contents('./xml/SSF1103037F1_FAC_AC16_20200225.xml', true);

	$wsdl = "https://wcfpruebas.facturoporti.com.mx/Timbrado/Servicios.svc?wsdl";

	$soapClient = new SoapClient($wsdl); 
	
	$parametroSeguridad = array ('Usuario' => 'PruebasTimbrado','Contrasenia' => '@Notiene1');
	$parametro = array ('XMLEntrada' =>  $fichero);
	
	$retval = $soapClient->TimbradoMultiEmpresas(array ('parametroSeguridad' => $parametroSeguridad,'parametro' => $parametro));
	
	//print_r ($retval);
	echo ('UUID ' . $retval->TimbradoMultiEmpresasResult->Timbrado->UUID);
	echo ('Cadena Original ' . $retval->TimbradoMultiEmpresasResult->Timbrado->CadenaOriginal);
	echo ('Sello SAT ' . $retval->TimbradoMultiEmpresasResult->Timbrado->SelloSAT);
	echo ('Fecha Timbrado ' . $retval->TimbradoMultiEmpresasResult->Timbrado->Fecha);
	
	
	echo '<script language="javascript">';
	echo "alert('". $retval->TimbradoMultiEmpresasResult->Timbrado->TimbreXML . "')";
	echo '</script>';

?>