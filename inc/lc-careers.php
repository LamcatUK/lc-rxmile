<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


function jobs_func($atts) {
    ob_start();
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'careers',
        'post_status' => 'publish'
    ));

    if ($q->have_posts()) {
        ?>
<div class="group joblistings">
        <?php
        while ($q->have_posts()) {
            $q->the_post();
            ?>
	<div class="joblisting">
		<div class="padding">
			<div class="job-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<div class="job-detail">
                <?php /*
                <strong>Location:</strong> <?php
                    $locas = array();
                    foreach (get_field('office') as $o) {
                        $loca = get_term_by('id', $o, 'locations');
                        array_push($locas, $loca->name);
                    }
                    echo implode(', ', $locas);
                ?><br/>
                */ ?>
				<strong>Posted:</strong> <?=get_the_date()?>
			</div>
			<div class="salary"><strong>Salary:</strong> <?php
                if (have_rows('base_salary')) {
                    while (have_rows('base_salary')) {
                        the_row();
                        echo '-';
                        if (get_sub_field('text')) {
                            echo get_sub_field('text');
                        }
                        else {
                            while (have_rows('numeric_salary')) {
                                the_row();
                                echo '$' . number_format(get_sub_field('minValue'));
                                if (get_sub_field('maxValue')) {
                                    echo ' - $' . number_format(get_sub_field('maxValue'));
                                }
                                echo ' per ' . strtolower(get_sub_field('QuantitativeValue'));
                            }
                        }
                    }
                }
                ?>
            </div>
		</div>
	</div>
<?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }
    else {
        echo 'We do not have any positions available at this time. Check back later to see new postings.';
    }
    
    ?>
</div>
<?php
    return ob_get_clean();
}
add_shortcode('jobs', 'jobs_func');
