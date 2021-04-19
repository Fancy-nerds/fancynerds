<?php
require_once ( get_template_directory() . '/_libs/crest/crest.php' );

class M4Ajax
{
	function __construct()
	{
		#Form with leads
		add_action('wp_ajax_nopriv_m4ajx_lead', array( $this, 'lead' ));
		add_action('wp_ajax_m4ajx_lead', array( $this, 'lead' ));

	}
	public function final( $arrr ){
		echo json_encode( $arrr );
		exit();
	}


	#Load
	public function lead(){

		$arrr = array();
		$fields=[];
		extract( $_POST );

		foreach ($dataSubm as $k=>$v) {
			if( $v['name']=='EMAIL'||$v['name']=='PHONE' ){
				$fields[$v['name']]=[["VALUE"=>$v['value'],"VALUE_TYPE" => "WORK"]];
				continue;
			}
			$fields[$v['name']]=$v['value'];
		}

		CRest::call(
			'crm.lead.add',
			[
		    'fields' =>$fields
			]
		);

		write_log(get_defined_vars());
		

		// $html = file_get_contents( "http://ip-api.com/json/".$ip."?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,query" );
		
		// append authorization data
		// if (defined('CRM_AUTH'))
		// {
		// 	$postData['AUTH'] = CRM_AUTH;
		// }
		// else
		// {
		// 	$postData['LOGIN'] = CRM_LOGIN;
		// 	$postData['PASSWORD'] = CRM_PASSWORD;
		// }

		// // open socket to CRM
		// $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
		// if ($fp)
		// {
		// 	// prepare POST data
		// 	$strPostData = '';
		// 	foreach ($postData as $key => $value)
		// 		$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		// 	// prepare POST headers
		// 	$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		// 	$str .= "Host: ".CRM_HOST."\r\n";
		// 	$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		// 	$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		// 	$str .= "Connection: close\r\n\r\n";

		// 	$str .= $strPostData;

		// 	// send POST to CRM
		// 	fwrite($fp, $str);

		// 	// get CRM headers
		// 	$result = '';
		// 	while (!feof($fp))
		// 	{
		// 		$result .= fgets($fp, 128);
		// 	}
		// 	fclose($fp);

		// 	// cut response headers
		// 	$response = explode("\r\n\r\n", $result);

		// 	$output = '<pre>'.print_r($response[1], 1).'</pre>';
		// }
		// else
		// {
		// 	$output = 'Connection Failed! '.$errstr.' ('.$errno.')';
		// }

		// $arrr['html'] = $output;
		$arrr['success'] = true;
 		echo json_encode( $arrr );
		exit();
	}
}
new M4Ajax;