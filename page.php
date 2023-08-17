<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$mt = is_front_page() ? '' : 'padding-top';
$modal = 0;
?>
<main id="main" class="<?=$mt?>">
    <?php
    the_post();    
    the_content(); 
    ?>
</main>
<?php
get_footer();