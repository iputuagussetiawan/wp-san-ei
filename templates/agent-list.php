<div class="col-md-4 agent-list">
	<div id="manage-post-area">
		<p><?php echo $category_slug ?></p>
		<div class="caf-post-title"><?php the_title(); ?></div>
		<div class="address"><span><?php echo pll__('Address')?></span><?php the_field('agent_address'); ?></div>
		<div class="phone"><span><?php echo pll__('Phone')?></span><?php the_field('agent_phone'); ?></div>
	</div>
</div>