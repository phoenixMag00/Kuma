/* Add classes or IDs (or remove classes or IDs) with jQuery */
jQuery(document).ready(function() {
	jQuery("#parent-navigation ul li:last-child").addClass("extra-border");
	jQuery("#parent-navigation ul ul li:last-child").removeClass("extra-border");
	jQuery("#employee-types li:last-child a").addClass("last-employee-type");
	jQuery("#footer-right h5:nth-child(n+6) a").addClass("second-icon-row");
	
});

//Clear Top Search Field when user focuses
function clearValue(field) {
	if (field.defaultValue == field.value) field.value = "";
}