<?php
/*   Template Name: Page Login */
$currentLang = pll_current_language();
get_header();
?>
<main>
    <section class="section-login section-padding">
        <div class="container">
            <?php
                the_content()
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>
