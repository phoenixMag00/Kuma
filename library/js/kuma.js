/* Add classes or IDs (or remove classes or IDs) with jQuery */
jQuery(document).ready(function() {
	jQuery("#parent-navigation ul li:last-child").addClass("extra-border");
	jQuery("#parent-navigation ul ul li:last-child").removeClass("extra-border");
	jQuery("#employee-types li:last-child a").addClass("last-employee-type");
	jQuery("#footer-right h5:nth-child(n+6) a").addClass("second-icon-row");
	
});

// Make Dropdowns keyboard accessible (Using Superfish Plugin)
function the_superfish() {
	jQuery('.menu > ul').superfish({
		delay:       1, 		// one second delay on mouseout
		speed:       1,			// faster animation speed
		autoArrows:  true,		// disable generation of arrow mark-up
		dropShadows: false		// disable drop shadows
	});
}

jQuery(document).ready(function() {
	jQuery.noConflict();
	the_superfish();
});

//Clear Top Search Field when user focuses
function clearValue(field) {
	if (field.defaultValue == field.value) field.value = "";
}