<?php
/*   Template Name: Page Home */
$currentLang = pll_current_language();
get_header();
?>
<main>
	<?php
        get_template_part('template-parts/sections/home', 'banner');
		get_template_part('template-parts/sections/home', 'categories');
		get_template_part('template-parts/sections/home', 'about');
		get_template_part('template-parts/sections/home', 'featuredproduct');
		// get_template_part('template-parts/sections/other','link');
    ?>
</main>
<?php
get_footer();
?>
