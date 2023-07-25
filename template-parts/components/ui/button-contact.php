<?php
$pageContactID = get_field('contact_link', 'page_link')->ID;
$contactLink = get_permalink($pageContactID);
$btnType = 'btn btn-warning';
if (isset($args['btnType'])) {
    $btnType = $args['btnType'];
} else {
    $btnType = 'btn btn-warning';
}
?>
<a href="<?php echo $contactLink ?>" class="<?php echo  $btnType; ?>"><span><?php echo pll__('Partner With Us'); ?></span></a>