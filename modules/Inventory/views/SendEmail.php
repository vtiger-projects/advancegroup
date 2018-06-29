<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Inventory_SendEmail_View extends Vtiger_ComposeEmail_View {

	public function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		if(!Users_Privileges_Model::isPermitted($moduleName, 'index') || !Users_Privileges_Model::isPermitted('Emails', 'CreateView')) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED'));
		}
	}

	/**
	 * Function which will construct the compose email
	 * This will handle the case of attaching the invoice pdf as attachment
	 * @param Vtiger_Request $request 
	 */
	public function composeMailData(Vtiger_Request $request) {
		parent::composeMailData($request);
		$viewer = $this->getViewer($request);
		$inventoryRecordId = $request->get('record');
        	$recordModel = Vtiger_Record_Model::getInstanceById($inventoryRecordId, $request->getModule());
	        $pdfFileName = $this->generatePDF($inventoryRecordId,$request->getModule());//$recordModel->getPDFFileName();

        $fileComponents = explode('/', $pdfFileName);

        $fileName = $fileComponents[count($fileComponents)-1];
        //remove the fileName
        array_pop($fileComponents);

		$attachmentDetails = array(array(
            'attachment' =>$fileName,
            'path' => implode('/',$fileComponents),
            'size' => filesize($pdfFileName),
				'type' => 'pdf',
				'nondeletable' => true
		));

		$this->populateTo($request);
		$viewer->assign('ATTACHMENTS', $attachmentDetails);
		echo $viewer->view('ComposeEmailForm.tpl', 'Emails', true);
	}

	public function populateTo($request){
		$viewer = $this->getViewer($request);

		$inventoryRecordId = $request->get('record');
		$recordModel = Vtiger_Record_Model::getInstanceById($inventoryRecordId, $request->getModule());
		$inventoryModule = $recordModel->getModule();
		$inventotyfields = $inventoryModule->getFields();

		$toEmailConsiderableFields = array('contact_id','account_id','vendor_id');
		$db = PearDatabase::getInstance();
		$to = array();
		$to_info = array();
		$toMailNamesList = array();
		foreach($toEmailConsiderableFields as $fieldName){
			if(!array_key_exists($fieldName, $inventotyfields)){
				continue;
			}
			$fieldModel = $inventotyfields[$fieldName];
			if(!$fieldModel->isViewable()) {
				continue;
			}
			$fieldValue = $recordModel->get($fieldName);
			if(empty($fieldValue)) {
				continue;
			}
			$referenceModule = Vtiger_Functions::getCRMRecordType($fieldValue);
			$fieldLabel = decode_html(Vtiger_Util_Helper::getRecordName($fieldValue));
			$referenceModuleModel = Vtiger_Module_Model::getInstance($referenceModule);
			if (!$referenceModuleModel) {
				continue;
			}
			if(isRecordExists($fieldValue)) {
				$referenceRecordModel = Vtiger_Record_Model::getInstanceById($fieldValue, $referenceModule);
				if ($referenceRecordModel->get('emailoptout')) {
					continue;
				}
			}
			$emailFields = $referenceModuleModel->getFieldsByType('email');
			if(count($emailFields) <= 0) {
				continue;
			}

			$current_user = Users_Record_Model::getCurrentUserModel();
			$queryGenerator = new QueryGenerator($referenceModule, $current_user);
			$queryGenerator->setFields(array_keys($emailFields));
			$query = $queryGenerator->getQuery();
			$query .= ' AND crmid = ' . $fieldValue;

			$result = $db->pquery($query, array());
			$num_rows = $db->num_rows($result);
			if($num_rows <= 0) {
				continue;
			}
			foreach($emailFields as $fieldName => $emailFieldModel) {
				$emailValue = $db->query_result($result,0,$fieldName);
				if(!empty($emailValue)){
					$to[] = $emailValue;
					$to_info[$fieldValue][] = $emailValue;
					$toMailNamesList[$fieldValue][] = array('label' => decode_html($fieldLabel), 'value' => $emailValue);
					break;
				}
			}
			if(!empty($to)) {
				break;
			}
		}
		$viewer->assign('TO', $to);
		$viewer->assign('TOMAIL_NAMES_LIST', json_encode($toMailNamesList, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
		$viewer->assign('TOMAIL_INFO', $to_info);
	}
	
	function generatePDF($record,$moduleName) {
		require_once('libraries/mpdf/mpdf.php');
		$sequenceNo = getModuleSequenceNumber($moduleName,$record);
		$translatedName = vtranslate($moduleName, $moduleName);
		$filePath = "storage/$translatedName"."_".$sequenceNo.".pdf";
	
		$viewer = new Vtiger_Viewer;
		
		$viewer = new Vtiger_Viewer;
		
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
		$mpdf->Output($filePath,'F');
		
		return $filePath;
	}

}
