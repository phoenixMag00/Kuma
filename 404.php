<?php get_header() ; ?>

<div id="content">

	<div class="section-container">

<div id="content-left" class="second-level-full-width">

		<div class="page">
    	
			<img src="<?php bloginfo('template_directory'); ?>/library/images/404-fun-image-300-300.jpg" class="alignleft" alt="Image for 404 Page" />
			
				<h2>404 - Page Not Found</h2>
			
					<p>Don't throw in the towel just yet! Troubleshooting tips are right below!</p>
    		
						<form method="get" action="http://search1.gmu.edu/search">
							
							<ul>
								<li id="search-line">Try
									<label id="search-404">searching the Mason Web: 
									<input name="q" type="text" class="text" maxlength="600" label="Search Mason Web"></label> 
											</li>
								<li> Check the <a href="http://www.gmu.edu/mlnavbar/masonaz/">Mason A-Z Directory</a>.</li>
								<li> If you typed the URL yourself, please make sure that the spelling is correct.</li>
								<li> If you clicked on a link to get here, there may be a problem with the link.</li>
							</ul>
							<p class="webmaster">If you still need assistance, contact the <a href="mailto:webmaster@gmu.edu">webmaster</a>.</p>
							<input type="hidden" name="site" value="mason_test">
							<input type="hidden" name="client" value="mason_test">
							<input type="hidden" name="proxystylesheet" value="mason_test">
							<input type="hidden" name="output" value="xml_no_dtd">
						
						</form>

		</div>

	</div>
	
	</div>

</div>

<?php get_footer(); ?>