<?php
if (isset($args['btn-link'])) {
    $btnLink = $args['btn-link'];
} else {
    $btnLink = '';
}
if (isset($args['btn-text'])) {
    $btnText = $args['btn-text'];
} else {
    $btnText = '';
}
?>
<a href="<?php echo $btnLink ?>" class="btn-primary-outline">
    <?php echo $btnText ?>
    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.8333 9L16 5M16 5L11.8333 1M16 5H0.999999" stroke="#2067A5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</a>