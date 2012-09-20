<div id="comments">

	<h3><?php comments_number('No Comments','1 Comment','% Comments'); ?></h3>

		<div class="commentlist"><?php wp_list_comments(array('style' => 'div', 'callback' => 'comment_format')); ?></div>
			
			<div class="paginate-comments">
			
				<?php paginate_comments_links() ?>
			
			</div>
			
				<?php comment_form('title_reply=Leave a Comment',''); ?>
				
</div>