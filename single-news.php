<?php
get_header();
while ( have_posts() ) :
	the_post();
?>

	<?php get_template_part('templates/banner-all-page') ?>	
	<section class="whats-on__article">
		<div class="container">
			<div class="whats-on-image">
				<img src="<?php the_post_thumbnail_url('full')?>" class="img-fit"/>
			</div>
			<div class="whats-on__desc whats-on__desc__content">
				<div class="date-content"><?php echo get_the_date('d M Y') ?></div>
				<?php the_content() ?>
			</div>
			<div class="share-button-news clearfix">
				<span><?php echo pll__('Share')?>: </span>
				<ul>
			  		<li class="share-facebook">
			  			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&quote=<?php the_title() ?>" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i><span class="sr-only">Share on Facebook</span></a>
			  		</li>
			  		<li class="share-twitter">
			  			<a href="https://twitter.com/intent/tweet?source=<?php the_title() ?>&text=<?php the_title() ?>:<?php the_permalink() ?>" target="_blank" title="Tweet"><i class="fab fa-twitter"></i><span class="sr-only">Tweet</span></a>
			  		</li>
			  		<li class="share-pinterest">
			  			<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&description=<?php the_title(); ?>" target="_blank" title="Pin it"><i class="fab fa-pinterest-p"></i><span class="sr-only">Pin it</span></a>
			  		</li>
			  		<li class="share-wa">
			  			<a href="https://api.whatsapp.com/send/?text=<?php the_title() ?>%20<?php the_permalink() ?>" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i><span class="sr-only">Share on Whatsapp</span></a>
			  		</li>
			  	</ul>
			</div>
		</div>
	</section>

	<section class="whats-on other-post">
		<div class="container">
			<div class="row">
				<div class="prev-posts col-6">
					<div class="row">
					    <?php // Get previous post.
					    $prev_post = get_previous_post(); 

					    if ( ! empty( $prev_post ) ) : ?>
					    	<div class="col-lg-4">
					    		<div class="img-holder">
					    			<?php echo get_the_post_thumbnail( $prev_post->ID, array( 500, 500 ) );?>
					    		</div>
					    	</div>
					    	<div class="col-lg-8">
					    		<p class="date"><?php echo get_the_date('d M Y') ?></p>
					    		<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
					    			<h3 class="whats-on__news-title"><?php echo $prev_post->post_title; ?></h3>
					    		</a>
					    		<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="link">
						            <i class="fas fa-chevron-left"></i> <?php echo pll__('Previous Post')?>
						        </a>
					    	</div>
					        
					    <?php endif; ?>
					</div>
				</div>
				<div class="next-posts col-6">
					<div class="row">
					    <?php // Get previous post.
					    $next_post = get_next_post(); 

					    if ( ! empty( $next_post ) ) : ?>
					    	<div class="col-lg-4 order-lg-12">
					    		<div class="img-holder">
					    			<?php echo get_the_post_thumbnail( $next_post->ID, array( 500, 500 ) );?>
					    		</div>
					    	</div>
					    	<div class="col-lg order-lg-1">
					    		<p class="date"><?php echo get_the_date('d M Y') ?></p>
					    		<a href="<?php echo get_permalink( $prev_post->ID ); ?>" >
					    			<h3 class="whats-on__news-title"><?php echo $next_post->post_title; ?></h3>
					    		</a>
					    		<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="link">
						            <?php echo pll__('Next Post')?> <i class="fas fa-chevron-right"></i>
						        </a>
					    	</div>
					    <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php 
endwhile;
get_footer(); 
?>