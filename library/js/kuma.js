/* Add classes or IDs (or remove classes or IDs) with jQuery */
jQuery(document).ready(function() {
	jQuery("#parent-navigation ul").attr('id', 'ada-dropdowns');
	jQuery("#parent-navigation ul li:last-child").addClass("extra-border");
	jQuery("#parent-navigation ul ul li:last-child").removeClass("extra-border");
	jQuery("#employee-types li:last-child a").addClass("last-employee-type");
	jQuery("#footer-right h5:nth-child(n+6) a").addClass("second-icon-row");
	
});

// So Useful...Works with the twentyten dropdown HTML and CSS packaged in Wordpress (In non-conflict mode due to requirments of wp_enque_script)
jQuery(document).ready(function(){
	jQuery("#ada-dropdowns li").hover(function(){
		jQuery("ul",jQuery(this)).fadeIn(0);
	},function(){
		jQuery("ul",jQuery(this)).fadeOut(0);	
	});
	jQuery("a").focus(function(){ // hide drop downs
		jQuery("#ada-dropdowns ul").fadeOut(0);
	});
	jQuery("#ada-dropdowns li a").focus(function(){ // main nav anchor focus
		jQuery("ul",jQuery(this).parent()).fadeIn(0);
	});
	jQuery("#ada-dropdowns li li a").unbind(); // unbind hide drop downs from sub nav anchors
});

//Clear Top Search Field when user focuses
function clearValue(field) {
	if (field.defaultValue == field.value) field.value = "";
}