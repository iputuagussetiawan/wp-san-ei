<?php
/*   Template Name: Page Wishlist */
get_header();
?>
<main>
    <section class="wishlist section-padding">
        <div class="container">
            <?php
                the_content()
            ?>
        </div>
    </section>
    <?php 
        get_template_part('template-parts/components/ui/breadcrumb');
    ?>
</main>
<?php
get_footer();
?>
