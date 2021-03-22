<?php 
/**
* Plugin Name:New Contact Form Submission 
* Plugin URI:
* Description: A Plugin to add New Contact Form Submission. Use shortcode [ncfs_contact_form] to display Contact Form for any page/post.
* Version: 1.0.0
* Author: Rajeev Chauhan
* Author URI: mailto:rajeev.glocify@gmail.com
* Text Domain: contactform
* Domain Path: /lang 
*
* @package contactform 
* @category Wordpress
* 
*
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'VERSION' ) ) {
	define('VERSION','1.0.0');
}

if ( ! class_exists( 'contactformsubmission' ) ) :
class contactformsubmission 
{

	function __construct()
	{
	  register_activation_hook( __FILE__,array(&$this, 'ncfs_activate_pliugin' ));   
      add_action('plugins_loaded',array(&$this, 'ncfs_localization_init_textdomain'));
      add_shortcode('ncfs_contact_form',array(&$this, 'ncfs_contact_form'));
      add_action('wp_enqueue_scripts',array(&$this, 'ncfs_add_css_and_scripts'));
	  add_action( 'wp_ajax_ncfs_contact_form_action', array(&$this, 'ncfs_contact_form_action' ));
	  add_action( 'wp_ajax_nopriv_ncfs_contact_form_action', array(&$this, 'ncfs_contact_form_action' ));
      include_once('inc/main.php');
	}
	function ncfs_add_css_and_scripts() {
		wp_register_style( 'ncfs_contactform_css', plugins_url('css/custom.css',__FILE__ ),array(), VERSION);
		wp_enqueue_style( 'ncfs_contactform_css' );
		wp_register_script( 'ncfs_contactform_js', plugins_url('js/custom.js',__FILE__ ), array( 'jquery' ), VERSION);
		// Localize the script with new data
		$translation_array = 
		array(
		'admin_url' => admin_url(),				
		);
		wp_localize_script( 'ncfs_contactform_js', 'ncfsContactJS', $translation_array );		
		wp_enqueue_script( 'ncfs_contactform_js' );
	}
	
	function ncfs_localization_init_textdomain()
	  {
	    $path = dirname(plugin_basename( __FILE__ )) . '/lang/';
	    $loaded = load_plugin_textdomain( 'loadmorepost', false, $path);
	  }

	  function ncfs_activate_pliugin()

	  {
		  // No action required
	  }
	function ncfs_contact_form($atts){
		include_once('inc/form.php');
	}
	function ncfs_contact_form_action(){
	   $formData = $_POST['formData'];
	   $user_name = $formData['0'];		  
	   $from_email = $formData['1'];
	   $phone = $formData['2'];
	   $company = $formData['3'];
	   $mgs1 = $formData['4'];	   
	   $subject = get_option('ncfs_email_subject');
	   if(empty($subject)){$subject = "Contact Form Submission";}
	   $successMgs = get_option('ncfs_success_msg');
	   if(empty($successMgs)){$successMgs = "Thank You for Connecting Us";}
	   $mgs ='';
	   $mgs .='<h3>User Info</h3>';
	   if(get_option('ncfs_username_check')==0){
		 $ncfs_user = get_option('ncfs_username_label');
		 if(empty($ncfs_user)){$ncfs_user="User Name";}  
		$mgs .='<p><b>'.$ncfs_user.': </b>'.$user_name.'</p>';
	   }
	   
		 $ncfs_email = get_option('ncfs_email_label');
		if(empty($ncfs_email)){$ncfs_email="Email";}
		$mgs .='<p><b>'.$ncfs_email.': </b>'.$from_email.'</p>';
	   if(get_option('ncfs_phone_check')==0){
		$ncfs_phone = get_option('ncfs_phone_label');
		if(empty($ncfs_phone)){$ncfs_phone="Phone";}
		$mgs .='<p><b>'.$ncfs_phone.': </b>'.$phone.'</p>';
	   }
	   if(get_option('ncfs_company_check')==0){
		$ncfs_company = get_option('ncfs_company_label');
		if(empty($ncfs_company)){$ncfs_company="Company Name";}
		$mgs .='<p><b>'.$ncfs_company.': </b>'.$company.'</p>';
		}
		if(get_option('ncfs_message_check')==0){
		$ncfs_message = get_option('ncfs_message_label');
		if(empty($ncfs_message)){$ncfs_message="Message";}
		$mgs .='<p><b>'.$ncfs_message.': </b>'.$mgs1.'</p>';
		}
	   $mgs .= 'Thanks';
	   if(empty($company)){$company="Company Info";}
	   if(($_SERVER['HTTP_HOST']=="localhost") || $_SERVER['HTTP_HOST']=="localhost:8080"){
		   $default_email = $from_email;
	   }else{
		  $default_email = "admin@".$_SERVER['HTTP_HOST']; 
	   }	   
	   $to = get_option('ncfs_email_send');
		if(empty($to)){get_option('admin_email');}
			$headers = "From: " . $user_name . "\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(mail($to,$subject,$mgs,$headers)){
				echo $successMgs;	
				}else{
				echo "Error Found!!!"	
				}
		
		wp_die();
	}
}
new contactformsubmission();
endif;



