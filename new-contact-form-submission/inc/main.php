<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ncfs_contact_admin {
	public function __construct()
	 {
	    add_action('admin_menu',array(&$this, 'ncfs_admin_menu_form'));
    }


    public function ncfs_admin_menu_form() 
  {
  add_menu_page('New Contact Form Submission','Contact Form', 'administrator', 'ncfs_admin_menu', array(&$this,'contactformsubmission_admin_all'),"dashicons-email-alt");
  }

  function contactformsubmission_admin_all(){
    include_once('admin-form.php');
  }
 }
new ncfs_contact_admin() ;