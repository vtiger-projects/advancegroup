{assign var=FINAL_DETAILS value=$RELATED_PRODUCTS.1.final_details}
<html>
<head>
	<title></title>
</head>
<body>&nbsp;
<div style="text-align:center">
<b>COTIZACI&Oacute;N</b><br/>
<table style="width:900px;overflow:wrap;">
<tr>
<td style="text-align:left;width:350px;font-size:120%;"><b>CLIENTE: {$ACCOUNTMODEL->get('accountname')}</b></td>
<td style="text-align:center;width:250px;font-size:120%;"><b>NIT: {$ACCOUNTMODEL->get('siccode')}</b></td>
<td style="text-align:right;width:300px;font-size:120%;"><b>FECHA: {$DATE}</b></td>
</tr>
</table>
</div>
<br/>
<table style="width:900px;overflow:wrap;" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="border:1px solid;width:450px;text-align:center;font-size:140%;">
			Articulo / Implementaci&oacute;n
			</td>
			<td style="border:1px solid;width:100px;text-align:center;font-size:120%;">
			Cantidad
			</td>
			<td style="border:1px solid;width:175px;text-align:center;font-size:120%;">
			Precio Unitario
			</td>
			<td style="border:1px solid;width:175px;text-align:center;font-size:120%;">
			Precio Total
			</td>
		</tr>
		{foreach key=INDEX item=LINE_ITEM_DETAIL from=$RELATED_PRODUCTS}
		<tr>
		
			<td style="border-left:1px solid;border-right:1px solid;font-size:120%;">
				<br/>
				<ul>
				<li><b><i>{$LINE_ITEM_DETAIL["productName$INDEX"]}</i></b></li>
				</ul>
				<br/>
				<p style="margin-left:20px">
				{decode_html($LINE_ITEM_DETAIL["comment$INDEX"])|nl2br}
				</p>
			</td>
			<td style="text-align:center;border-right:1px solid;font-size:120%;">
				{$LINE_ITEM_DETAIL["qty$INDEX"]}
			</td>
			<td style="text-align:center;border-right:1px solid;font-size:120%;">
				$ {CurrencyField::convertToUserFormat($LINE_ITEM_DETAIL["listPrice$INDEX"])} COP
			</td>
			<td style="text-align:center;border-right:1px solid;font-size:120%;">
				$ {CurrencyField::convertToUserFormat($LINE_ITEM_DETAIL["netPrice$INDEX"])} COP
			</td>

		</tr>
		{/foreach}
		<tr>
			<td style="border-left:1px solid;border-right:1px solid;">
			&nbsp;
			</td>
			<td colspan="3" style="text-align:left;border-right:1px solid;border-top:1px solid;font-size:120%;">
			Subtotal: $ {CurrencyField::convertToUserFormat($FINAL_DETAILS["hdnSubTotal"])} COP
			</td>
		</tr>
		<tr>
			<td style="border-left:1px solid;border-right:1px solid;">
			&nbsp;
			</td>
			<td colspan="3" style="text-align:left;border-top:1px solid;border-right:1px solid;font-size:120%;">
			IVA: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ {CurrencyField::convertToUserFormat($FINAL_DETAILS["tax_totalamount"])} COP
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border:1px solid;border-right:1px solid;font-size:120%;">
			PRECIOS INCLUYEN IVA &ndash; INCLUYE SOPORTE 45 DIAS
			</td>
			<td colspan="3" style="text-align:left;border:1px solid;font-size:120%;">
			<h3>Total: $ {CurrencyField::convertToUserFormat($FINAL_DETAILS["grandTotal"])} COP</h3>
			</td>
		</tr>
	</tbody>
</table>

<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>

<p style="text-align:justify">La implementaci&oacute;n requerida por {$ACCOUNTMODEL->get('accountname')}, tiene como objetivo la centralizaci&oacute;n, monitoreo y respaldo del tr&aacute;fico de llamadas a trav&eacute;s de un Servidor IP PBX.</p>
&nbsp;

<p style="text-align:justify">La estructura del montaje es la siguiente:</p>
&nbsp;

<p style="text-align:center"><img height="243" src="test/upload/ippbx.png" width="304" /></p>
&nbsp;

<p style="text-align:justify">El esquema mostrado en la figura de arriba, muestra c&oacute;mo se realizar&iacute;a la centralizaci&oacute;n de los servicios de telefon&iacute;a para atenci&oacute;n al cliente a trav&eacute;s de campa&ntilde;as entrantes y salientes; permitiendo a Smart tener control total de la atenci&oacute;n que brinda a sus clientes, Adem&aacute;s de Centralizar y enviar el servicio de Voz sobre IP a las sucursales remotas de la organizaci&oacute;n.</p>

<p style="text-align:justify">De esta manera desde cualquier sitio en donde se cuente con conexi&oacute;n a Internet podr&aacute;n tener acceso al aplicativo, tr&aacute;fico de llamadas, grabaciones, reportes y dem&aacute;s funciones prestadas por el software.</p>

<p style="text-align:justify">Adicionalmente cada uno de los puntos a donde se dirija el tr&aacute;fico de voz sobre IP, se puede ajustar bajo condiciones de seguridad perimetrales de ISO/IEC27001, evitando as&iacute; conexiones no autorizadas a la infraestructura TI de la entidad.</p>

<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>

<p style="text-align:justify"><strong>ALCANCE:</strong> {$RECORD->get('cf_852')}</p>

<p style="text-align:justify"><strong>REQUERIMIENTOS:</strong> {$RECORD->get('cf_854')}</p>

<p style="text-align:justify"><strong>TIEMPO DE ENTREGA:</strong> {$RECORD->get('cf_856')}</p>

<p style="text-align:justify"><strong>ADICIONALES:</strong> {$RECORD->get('cf_858')}</p>

<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>

<p style="text-align:justify">Caracter&iacute;sticas del Software:</p>

<div dir="ltr">
<table>
	<colgroup>
		<col width="288" />
		<col width="426" />
	</colgroup>
	<tbody>
		<tr>
			<td>
			<p style="text-align:justify">- Grabaci&oacute;n de Llamadas</p>
			</td>
			<td>
			<p style="text-align:justify">- Centro de Conferencias con Salas Virtuales</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Correo de Voz</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para protocolos SIP e IAX, entre otros</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Correo de voz-a-Email</p>
			</td>
			<td>
			<p style="text-align:justify">- Codecs soportados: ADPCM, G.711 (A-Law &amp; &mu;-Law), G.722, G.723.1 (pass through), G.726, G.728, G.729, GSM, iLBC (opcional) entre otros.</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- IVR Configurable y Flexible</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para Interfaces An&aacute;logas como FXS/FXO (PSTN/POTS)</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Soporte para Sintetizaci&oacute;n de Voz</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para interfaces digitales E1/T1/J1 a trav&eacute;s de los protocolos PRI/BRI/R2</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Herramienta para la creaci&oacute;n de extensiones por lote</p>
			</td>
			<td>
			<p style="text-align:justify">- Identificaci&oacute;n de llamadas (Caller ID)</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Cancelador de eco integrado</p>
			</td>
			<td>
			<p style="text-align:justify">- Troncalizaci&oacute;n</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Provisionador de Tel&eacute;fonos v&iacute;a Web</p>
			</td>
			<td>
			<p style="text-align:justify">- Rutas entrantes y salientes con configuraci&oacute;n por coincidencia de patrones de marcado</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Soporte para videoconferencias</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para follow-me</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Interfaz de detecci&oacute;n de Hardware</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para grupos de timbrado</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Servidor DHCP para asignaci&oacute;n din&aacute;mica de Ips</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para paging e intercom</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Panel de Operador basado en Web</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para condiciones de tiempo</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Parqueo de llamadas</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para PINes de seguridad</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Reporte de detalle de llamadas (CDR)</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para DISA (Direct Inward System Access)</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Tarifaci&oacute;n con reporte de consumo por destino</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para Callback</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Reportes de uso de canales</p>
			</td>
			<td>
			<p style="text-align:justify">- Soporte para interfaces tipo bluetooth a trav&eacute;s de tel&eacute;fonos celulares (chan_mobile)</p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify">- Soporte para colas de llamadas</p>
			</td>
			<td></td>
		</tr>
	</tbody>
</table>
</div>
&nbsp; 

<p style="text-align:center"><strong>CANALES DE ATENCIÓN Y SOPORTE<br>
Web: https://www.advancegroup.com.co/servicio-al-cliente/<br>
Línea de Atención: 57 (1) 381 9440 <strong></p>

&nbsp;
<p style="text-align:left:"><strong>Cordialmente,<br><br>
Grupo de Soluciones Empresariales<br>
Advance Group Colombia<strong></p>


<div></div>
</body>
</html>
