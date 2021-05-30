<?php
require_once ( get_template_directory() . '/libs/crest/crest.php' );

class M4Ajax
{
	private $wpdb;
	function __construct()
	{
		global $wpdb;
		$this->wpdb = $wpdb;

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
		$fields=['ASSIGNED_BY_ID'=>C_REST_ASSIGNED_BY_ID];
		
		extract( $_POST );
		
		foreach ($dataSubm as $k=>$v) :
			if( $v['name']=='EMAIL'||$v['name']=='PHONE' ){
				$fields[$v['name']]=[["VALUE"=>$v['value'],"VALUE_TYPE" => "WORK"]];
				continue;
			}
			$fields[$v['name']]=$v['value'];
		endforeach;

		$result = M4Helpers::checkRecaptchaFilter($fields['g-recaptcha-response']);

		if (!$result['success']) {
			wp_send_json_error( array(
				'message' => 'Invalid CAPTCHA token. Please try again.'
			));
			return;
		}

		#get First name / Last name / EMAIL / of affiliate
		if( isset($fields[C_REST_AFF_ID]) && $fields[C_REST_AFF_ID] !== '' ){
			$aff_users = $this->wpdb->prefix . "aff_affiliates";
			$sql = $this->wpdb->prepare( "SELECT * FROM {$aff_users} WHERE affiliate_id=%d", $fields[C_REST_AFF_ID] );
			$aff_user = $this->wpdb->get_results( $sql,ARRAY_A );
			if(is_array($aff_user) && count($aff_user)>0){
				$fields[C_REST_AFF_NAME] = $aff_user[0]['name'];
				$fields[C_REST_AFF_EMAIL] = $aff_user[0]['email'];
			}
		}
		CRest::call(
			'crm.lead.add',
			[
		    'fields' =>$fields
			]
		);
		$arrr['success'] = true;
 		wp_send_json_success(array(
			 'message' => 'We received your message, and we will contact you soon!'
		 ));
	}
}
new M4Ajax;