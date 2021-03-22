<?php
if(isset($_POST['ncfs_setting_submit'])){
	if(!isset($_POST['ncfs_title_check'])){$_POST['ncfs_title_check']=0;}
	if(!isset($_POST['ncfs_username_check'])){$_POST['ncfs_username_check']=0;}
	if(!isset($_POST['ncfs_phone_check'])){$_POST['ncfs_phone_check']=0;}
	if(!isset($_POST['ncfs_company_check'])){$_POST['ncfs_company_check']=0;}
	if(!isset($_POST['ncfs_message_check'])){$_POST['ncfs_message_check']=0;}	
	$result = array('ncfs_title_check'=>sanitize_text_field($_POST['ncfs_title_check']),'ncfs_username_check'=>sanitize_text_field($_POST['ncfs_username_check']),'ncfs_phone_check'=>sanitize_text_field($_POST['ncfs_phone_check']),'ncfs_company_check'=>sanitize_text_field($_POST['ncfs_company_check']),'ncfs_message_check'=>sanitize_text_field($_POST['ncfs_message_check']),'ncfs_form_label'=>sanitize_text_field($_POST['ncfs_form_label']),'ncfs_username_label'=>sanitize_text_field($_POST['ncfs_username_label']),'ncfs_email_label'=>sanitize_text_field($_POST['ncfs_email_label']),'ncfs_phone_label'=>sanitize_text_field($_POST['ncfs_phone_label']),'ncfs_company_label'=>sanitize_text_field($_POST['ncfs_company_label']),'ncfs_message_label'=>sanitize_text_field($_POST['ncfs_message_label']),'ncfs_submit_label'=>sanitize_text_field($_POST['ncfs_submit_label']),'ncfs_email_subject'=>sanitize_text_field($_POST['ncfs_email_subject']),'ncfs_email_send'=>sanitize_text_field($_POST['ncfs_email_send']),'ncfs_success_msg'=>sanitize_text_field($_POST['ncfs_success_msg']));
	foreach($result as $key=>$val){
		delete_option($key);
		add_option($key, $val);
	}?>
	<div class="notice notice-success settings-error is-dismissible"> 
<p><strong>Data has been updated successfully.</strong></p></div>
<?php }
?>
<h1>Setting</h1>
<form id="setting-form" action="" method="POST">
<table class="form-table">
<tbody>
<tr><td colspan="2"><h3>Hide Form Field</h3></td></tr>
<tr>
<th scope="row">Form Title</th>
<td><input name="ncfs_title_check" type="checkbox" value="1" <?php if(!empty(get_option('ncfs_title_check'))){echo 'checked';}?> >Hide Title</td>
</tr>
<tr>
<th scope="row">Username</th>
<td><input name="ncfs_username_check" type="checkbox" value="1" <?php if(!empty(get_option('ncfs_username_check'))){echo 'checked';}?> >Hide Username</td>
</tr>
<tr>
<th scope="row">Phone</th>
<td><input name="ncfs_phone_check" type="checkbox" value="1" <?php if(!empty(get_option('ncfs_phone_check'))){echo 'checked';}?>>Hide Phone</td>
</tr>
<tr>
<th scope="row">Company Name</th>
<td><input name="ncfs_company_check" type="checkbox" value="1" <?php if(!empty(get_option('ncfs_company_check'))){echo 'checked';}?>>Hide Company Name</td>
</tr>
<tr>
<th scope="row">Message</th>
<td><input name="ncfs_message_check" type="checkbox" value="1" <?php if(!empty(get_option('ncfs_message_check'))){echo 'checked';}?>>Hide Message</td>
</tr>
<tr><td colspan="2"><h3>Form Label</h3></td></tr>

<tr>
<th scope="row">Form Title</th>
<td><input name="ncfs_form_label" type="text" class="regular-text" placeholder="Contact Form" value="<?php echo get_option('ncfs_form_label');?>"></td>
</tr>
<tr>
<th scope="row">Username</th>
<td><input name="ncfs_username_label" type="text" class="regular-text" placeholder="User Name" value="<?php echo get_option('ncfs_username_label');?>"></td>
</tr>
<tr>
<th scope="row">Email</th>
<td><input name="ncfs_email_label" type="text" class="regular-text" placeholder="Email" value="<?php echo get_option('ncfs_email_label');?>"></td>
</tr>
<tr>
<th scope="row">Phone</th>
<td><input name="ncfs_phone_label" type="text" class="regular-text" placeholder="Phone" value="<?php echo get_option('ncfs_phone_label');?>"></td>
</tr>

<tr>
<th scope="row">Company Name</th>
<td><input name="ncfs_company_label" type="text" class="regular-text" placeholder="Company Name" value="<?php echo get_option('ncfs_company_label');?>"></td>
</tr>
<tr>
<th scope="row">Message</th>
<td><input name="ncfs_message_label" type="text" class="regular-text" placeholder="Message" value="<?php echo get_option('ncfs_message_label');?>"></td>
</tr>
<tr>
<th scope="row">Submit Button Text</th>
<td><input name="ncfs_submit_label" type="text" class="regular-text" value="<?php echo get_option('ncfs_submit_label');?>" placeholder="Submit">
</td>
</tr>
<tr><td colspan="2"><h3>Email Setting</h3></td></tr>
<tr>
<th scope="row">Subject Text</th>
<td><input name="ncfs_email_subject" type="text" class="regular-text" value="<?php echo get_option('ncfs_email_subject');?>" placeholder="Subject Text">
</td>
</tr>
<tr>
<th scope="row">Email To</th>
<td><input name="ncfs_email_send" type="text" class="regular-text" value="<?php echo get_option('ncfs_email_send');?>" placeholder="your-email@gmail.com">
</td>
</tr>
<tr>
<th scope="row">Success Message</th>
<td><textarea name="ncfs_success_msg" class="regular-text" placeholder="Message Here..."><?php echo get_option('ncfs_success_msg');?></textarea>
</td>
</tr>
<tr><td colspan="2"><h3>Shortcode</h3></td></tr>
<tr>
<th scope="row">Shortcode</th>
<td><b>[ncfs_contact_form]</b></td>
</tr>
</tbody>
</table>
<p class="submit"><input type="submit" name="ncfs_setting_submit" class="button button-primary" value="Save Changes"></p></form>


