<section class="market-maps">
	<div class="container-fluid">
		<div class="img-holder">
			<img class="img-fit" src="<?php echo get_stylesheet_directory_uri() . '/images/indonesia.svg'?>">
		</div>
		<?php
			$terms = get_terms( array(
				'taxonomy' => 'agent_location',
				'hide_empty' => false,
			) );
			foreach( $terms as $term ) { ?>
				<div id="<?php echo $term->slug ?>" class="location-holder">
					<a data-bs-toggle="modal" href="#marketModal" class="modal-btn" data-categories="<?php echo $term->slug ?>">
						<span class="pin-title"><?php echo $term->name ?></span>
						<img width="20" height="20" class="map-pin" src="<?php echo get_stylesheet_directory_uri() . '/images/map-pin.svg'?>">
					</a>
				</div>
			<?php }
		?>

	</div>
</section>

<!-- Modal -->

<div class="modal fade" id="marketModal" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body text-center">
      			<img id="loading-image" src="<?php echo get_stylesheet_directory_uri() . '/images/icon/spinner-third.svg'?>" style="display:none;"/>
      			<div class="row market-modal"></div>
  			</div>
		</div>
	</div>
</div>


<section class="agent agent-mobile">
	<div class="container">
		<?php echo do_shortcode('[caf_filter id="304"]'); ?>
	</div>
</section>