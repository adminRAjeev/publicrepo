<form class="ncfs_contact_form" id="ncfs_contact_form">
<?php if(get_option('ncfs_title_check')==0):
$ncfs_form = get_option('ncfs_form_label');
if(empty($ncfs_form)){$ncfs_form="Contact Form";}?>
<h2><?php echo $ncfs_form;?></h2>
<?php endif;?>
<?php if(get_option('ncfs_username_check')==0):
$ncfs_user = get_option('ncfs_username_label');
if(empty($ncfs_user)){$ncfs_user="User Name";}?>
<div class="ncfs_form_field ncfs_name"><input id="ncfs_name" name="ncfs_name" type="text" onkeyup="this.setAttribute('value', this.value);" value="" required><span class="ncfs_placeholder"><?php echo $ncfs_user;?></span><p class="ncfs_alert"><?php echo $ncfs_user;?> Required!</p></div>
<?php endif;
$ncfs_email = get_option('ncfs_email_label');
if(empty($ncfs_email)){$ncfs_email="Email";}?>
<div class="ncfs_form_field ncfs_email"> <input id="ncfs_email" name="ncfs_email" type="email" onkeyup="this.setAttribute('value', this.value);" value="" required><span class="ncfs_placeholder"><?php echo $ncfs_email;?></span><p class="ncfs_alert"><?php echo $ncfs_email;?> Required!</p></div>
<?php if(get_option('ncfs_phone_check')==0):
$ncfs_phone = get_option('ncfs_phone_label');
if(empty($ncfs_phone)){$ncfs_phone="Phone";}?>
<div class="ncfs_form_field ncfs_phone"><input type="text" name="ncfs_phone_number" id="ncfs_phone_number" onkeyup="this.setAttribute('value', this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="" required><span class="ncfs_placeholder"><?php echo $ncfs_phone;?></span><p class="ncfs_alert"><?php echo $ncfs_phone;?> Required!</p></div>
<?php endif; if(get_option('ncfs_company_check')==0):
$ncfs_company = get_option('ncfs_company_label');
if(empty($ncfs_company)){$ncfs_company="Company Name";}?>
<div class="ncfs_form_field ncfs_company"><input id="ncfs_company_name" name="ncfs_company_name" type="text" onkeyup="this.setAttribute('value', this.value);" value="" required><span class="ncfs_placeholder"><?php echo $ncfs_company;?></span></div>
<?php endif; if(get_option('ncfs_message_check')==0):
$ncfs_message = get_option('ncfs_message_label');
if(empty($ncfs_message)){$ncfs_message="Message";}?>
<div class="ncfs_form_field ncfs_message"><textarea id="ncfs_message" name="ncfs_message"></textarea><span class="ncfs_placeholder"><?php echo $ncfs_message;?></span><p class="ncfs_alert"><?php echo $ncfs_message;?> Required!</p></div>
<?php endif;
$ncfs_submit = get_option('ncfs_submit_label');
if(empty($ncfs_submit)){$ncfs_submit="SUBMIT";}?>
<div class="ncfs_submit"> <button id="ncfs_submitbtn" type="button"><?php echo $ncfs_submit;?></button></div>
<p id="ncfs_success"></p>
</form>
