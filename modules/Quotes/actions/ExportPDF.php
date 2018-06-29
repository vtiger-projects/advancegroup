<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
require_once('libraries/mpdf/mpdf.php');
class Quotes_ExportPDF_Action extends Vtiger_Action_Controller {
	
	public function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$recordId = $request->get('record');
		$currentUser = Users_Record_Model::getCurrentUserModel();
		
		if(!Users_Privileges_Model::isPermitted($moduleName, 'DetailView', $recordId) || !$currentUser->isAdminUser()) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED', $moduleName));
		}
	}
	
	public function process(Vtiger_Request $request) {
		
		$viewer = new Vtiger_Viewer;
		$moduleName = $request->getModule();
		$record = $request->get('record');
		
		$recordModel = Vtiger_Record_Model::getInstanceById($record);
		$recordStrucure = Vtiger_RecordStructure_Model::getInstanceFromRecordModel($recordModel, Vtiger_RecordStructure_Model::RECORD_STRUCTURE_MODE_DETAIL);
		$structuredValues = $recordStrucure->getStructure();
		
		$accountModel = Vtiger_Record_Model::getInstanceById($recordModel->get('account_id'),'Accounts');
		
		if (!empty($recordModel->get('contact_id')))
			$contactModel = Vtiger_Record_Model::getInstanceById($recordModel->get('contact_id'),'Contacts');
		else
			$contactModel = Vtiger_Record_Model::getCleanInstance('Contacts');
		
		$relatedProducts = $recordModel->getProducts();
		
		$bill_street = $accountModel->get('bill_street');
		$bill_city = $accountModel->get('bill_city');
		$bill_state = $accountModel->get('bill_state');
		$bill_country = $accountModel->get('bill_country');
		
		$direccion = $bill_street;
		
		if (!empty($direccion))
			$direccion.= "\n<br/>";
		$direccion.= $bill_city;
		
		if (!empty($direccion))
			$direccion.= ", ";
		$direccion.= $bill_state;
		
		if (!empty($direccion))
			$direccion.= ", ";
		$direccion.= $bill_country;
		
		$userModel = Users_Record_Model::getInstanceById($recordModel->get('assigned_user_id'),'Users');
		
		/*$detailView = new Assets_Detail_View;
		
		
		
		if (!empty($recordModel->get('contact')))
			$productModel = Vtiger_Record_Model::getInstanceById($recordModel->get('product'),'Products');
		else
			$productModel = Vtiger_Record_Model::getCleanInstance('Products');
		
		if (!empty($recordModel->get('contact')))
			$contactModel = Vtiger_Record_Model::getInstanceById($recordModel->get('contact'),'Contacts');
		else
			$contactModel = Vtiger_Record_Model::getCleanInstance('Contacts');
		
		
		
		
		$viewer->assign('MODULE_NAME', $moduleName);
		$viewer->assign('USERMODEL', $userModel);
		
		$viewer->assign('CONTACTMODEL', $contactModel);
		$viewer->assign('PRODUCTMODEL', $productModel);
		*/

		$viewer->assign('ACCOUNTMODEL', $accountModel);
		$viewer->assign('RECORD', $recordModel);
		$viewer->assign('RELATED_PRODUCTS', $relatedProducts);
		$date = new DateTimeField($recordModel->get('createdtime'));
		$viewer->assign('DATE', $date->getDisplayDate());
		$contacto = $contactModel->get('title');
		if (!empty($contacto))
			$contacto.= ' ';
		
		$contacto.= $contactModel->get('firstname').' '.$contactModel->get('lastname');
		
		if ($_REQUEST['Tipo'] == '2')
			$buffer = $viewer->view('ExportPDF2.tpl', $moduleName,true);
		else
			$buffer = $viewer->view('ExportPDF.tpl', $moduleName,true);
		$header = '<table style="width:800px;"><tr><td style="width:400px"><img src="test/upload/logo-advance.png" width="200px"><td style="width:400px;text-align:right">Cotizaci&oacute;n N&deg;'.$recordModel->get('quote_no').'</td></tr></table>';
						
		$footer = '<div style="text-align: center;"><b>Bases de Datos SQL | Programaci&oacute;n PHP, HTML y CSS | Telefon&iacute;a IP | Creaci&oacute;n y Dise&ntilde;o&nbsp;de P&aacute;ginas Web | Redes y Seguridad | Servidores Linux y Terminal Server |<br />
Tel.: 57 (1) 382 67 33 - Cedritos: Calle 153 # 17&ndash;68 Of. 301 - Centro Internacional: Cra. 7 # 27-52 Of. 702</div>

<div style="text-align: center;"><a href="http://www.advancegroup.com.co">www.advancegroup.com.co</a></b></div>
';
		$portada = '
		<br/><br/><br/><br/><div style="text-align: center;"><img height="166" src="test/upload/customercare.jpg" width="672" /></div>

		<div style="text-align: center;"><img height="208" src="test/upload/partners.png" width="488" /></div>
		<br />
		<div style="text-align:right">
		<h1 style="color:red">OFERTA COMERCIAL</h1>
		<h3>'.$accountModel->get('accountname').'</h3><br/><br/>
		<span style="color:red">Cotizaci&oacute;n N&deg;'.$recordModel->get('quote_no').': '.$recordModel->get('subject').'</span><br/>
		<br/><br/><br/><br/>
		<span>Advance Group Colombia</span><br/>
		<span style="font-size:65%;">Grupo de Soluciones Empresariales</span>
		</div>';
		
	
		$mpdf=new mPDF('','A4', 0, 'Arial', 15, 15, 5, 16, 9, 9,'P');
		
		$mpdf->shrink_tables_to_fit=0;
		$mpdf->keep_table_proportions = true;
		$mpdf->useSubstitutions = true; // optional - just as an example
		$mpdf->setAutoTopMargin = 'stretch'; 
		$mpdf->setAutoBottomMargin = 'stretch'; 
		$mpdf->AddPage();
		$mpdf->WriteHTML($portada);
		$mpdf->SetHTMLHeader ($header);  // optional - just as an example
		$mpdf->AddPage();
		$mpdf->SetHTMLFooter ($footer);
		$mpdf->setBasePath($url);
		$mpdf->WriteHTML($buffer);
		$mpdf->Output();
		exit;
	}
}
