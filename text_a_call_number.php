<?php
	/* Loads Javascript and CSS for Text a Call Number Feature */
	
	define("SMS_INCLUDE_PATH","//library.pdx.edu/primo/sms");
?>


<script src="<?php print(SMS_INCLUDE_PATH); ?>/sms.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print(SMS_INCLUDE_PATH); ?>/sms.css">

<script>
jQuery( document ).ready(function(jQuery) {
	
	// detect when the Action Menu has been clicked
	jQuery(".EXLTabHeaderButtonSendTo").click(function() {
		update_actions_menu(jQuery(this).children("ol"));
	});
	
	// reset click event trigger after ajax has finished loading
	jQuery( document ).ajaxComplete(function() {
		jQuery(".EXLTabHeaderButtonSendTo").off('click');
		jQuery(".EXLTabHeaderButtonSendTo").click(function() {
			update_actions_menu(jQuery(this).find("ol"));
		});
	});
});

// add new action to actions menu
function update_actions_menu(obj) {
	
	// find result id for selected Action Menu
	var parent_tr = jQuery(obj).parent().parent().parent().parent().parent().parent().parent();
		
	var sms_result_id = "";
	
	// set result id
	if(parent_tr.length == 0)
		sms_result_id = "";
	else
		sms_result_id = (parent_tr[0].rowIndex  - 1);

	// remove possibly existing TextCallNumber action menu item
	while(jQuery('#TextCallNumber'+sms_result_id).length != 0) {
		jQuery('#TextCallNumber'+sms_result_id).remove();
	}

	// locate availability status based on result type
	var availability = "";
	if(sms_result_id >= 0)
		availability = jQuery("#RTADivTitle_"+sms_result_id).text().trim();
	else
		availability = jQuery(".EXLResultStatusAvailable").text().trim();

	// if physical location exists, add sms link to menu
	if (availability.indexOf("Available at") >= 0) {
		// adding sms action item...
		obj.append('<li id="TextCallNumber'+sms_result_id+'" class="EXLButtonSendToDelicious"><a href="javascript:showsms('+sms_result_id+');"><span class="EXLButtonSendToLabel">Send via text</span><span class="EXLButtonSendToIcon EXLButtonSendToIconRISPushTo"></span></a></li>');
	}
}
</script>
<div id="sms" style=""></div>
