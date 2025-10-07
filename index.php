<?php
/**
 * The main template file
 *
 * @package cb-mvp
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="padding-top">
    <div class="container py-5">
        <div class="page-meta">
            <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
                yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
            }
            ?>
        </div>
        <h1 class="mb-5">News and Insights</h1>
        <?php
        if ( get_the_content( null, false, get_option( 'page_for_posts' ) ) ) {
            echo '<div class="mb-5">' . wp_kses_post( apply_filters( 'the_content', get_the_content( null, false, get_option( 'page_for_posts' ) ) ) ) . '</div>';
        }

        // Get all categories and years used in posts for filter buttons.
        $all_cats  = array();
        $all_years = array();
        $insights  = array();
        while ( have_posts() ) {
            the_post();
            $cats     = get_the_category();
            $category = $cats ? $cats[0]->name : '';
            if ( $category && ! in_array( $category, $all_cats, true ) ) {
                $all_cats[] = $category;
            }
            $post_year = get_the_date( 'Y' );
            if ( $post_year && ! in_array( $post_year, $all_years, true ) ) {
                $all_years[] = $post_year;
            }
            ob_start();
            $img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            if ( ! $img ) {
                $img = catch_that_image( $post );
            }
            ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="insight" data-category="<?= esc_attr( $category ); ?>" data-year="<?= esc_attr( $post_year ); ?>">
                    <a href="<?= esc_url( get_the_permalink() ); ?>">
                        <div class="insight__image"
                            style="background-image:url('<?= esc_url( $img ); ?>')">
                        </div>
                        <div class="insight__meta">
                            <div>
                                <?= esc_html( get_the_author_meta( 'display_name' ) ); ?><br><?= esc_html( get_the_date( 'jS F, Y' ) ); ?>
                            </div>
                            <div><strong><?= esc_html( $category ); ?></strong>
                            </div>
                            <div>
                                <?= wp_kses_post( estimate_reading_time_in_minutes( get_the_content(), 300, true, true ) ); ?>
                            </div>
                        </div>
                        <div class="insight__card">
                            <div class="insight__title">
                                <?= esc_html( get_the_title() ); ?>
                            </div>
                            <div class="insight__excerpt">
                                <?= esc_html( wp_trim_words( get_the_content(), 30 ) ); ?>
                            </div>
                        </div>
                        <div class="insight__link">See more</div>
                    </a>
                </div>
            </div>
            <?php
            $insights[] = ob_get_clean();
        }

        // Output filter buttons.

        ?>
        <div class="filters g-4 mb-5">
            <?php
            // Category filter group.
            if ( ! empty( $all_cats ) ) {
                echo '<div class="row mb-2 filter-buttons" id="category-filter-group">';
                echo '<div class="col-md-1"><span class="me-2 text-center">Category:</span></div>';
                echo '<div class="col-md-9">';
                echo '<button class="btn btn-sm btn-outline-primary me-2 filter-btn filter-btn-category active" data-filter="all">All</button>';
                foreach ( $all_cats as $catg ) {
                    echo '<button class="btn btn-sm btn-outline-primary me-2 filter-btn filter-btn-category" data-filter="' . esc_attr( $catg ) . '">' . esc_html( $catg ) . '</button>';
                }
                echo '</div>';
                echo '</div>';
            }

            // Year filter group.
            if ( ! empty( $all_years ) ) {
                echo '<div class="row mb-4 filter-buttons" id="year-filter-group">';
                echo '<div class="col-md-1"><span class="me-2">Year:</span></div>';
                echo '<div class="col-md-9">';
                echo '<button class="btn btn-sm btn-outline-primary me-2 filter-btn filter-btn-year active" data-filter="all">All</button>';
                foreach ( $all_years as $filter_year ) {
                    echo '<button class="btn btn-sm btn-outline-primary me-2 filter-btn filter-btn-year" data-filter="' . esc_attr( $filter_year ) . '">' . esc_html( $filter_year ) . '</button>';
                }
                echo '</div>';
                echo '</div>';
            }

            // reset button.
            if ( ! empty( $all_cats ) || ! empty( $all_years ) ) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-outline-secondary filter-btn filter-btn-reset" id="reset-filters">Reset Filters</button>
                    </div>
                </div>
                <?php
            }
            ?>
            
        </div>
        <?php
        // Output insights.
        echo '<div class="insights row">';
        foreach ( $insights as $insight_html ) {
            echo wp_kses_post( $insight_html );
        }
        echo '</div>';
        ?>
    </div>
    </section>
</main>
<script>
// Combination filter for insights (category + year)
document.addEventListener('DOMContentLoaded', function() {
    var catBtns = document.querySelectorAll('.filter-btn-category');
    var yearBtns = document.querySelectorAll('.filter-btn-year');
    var insightCards = document.querySelectorAll('.insight');
    var selectedCat = 'all';
    var selectedYear = 'all';

    function updateDisplay() {
        insightCards.forEach(function(card) {
            var cardCat = card.getAttribute('data-category');
            var cardYear = card.getAttribute('data-year');
            var catMatch = (selectedCat === 'all' || cardCat === selectedCat);
            var yearMatch = (selectedYear === 'all' || cardYear === selectedYear);
            if (catMatch && yearMatch) {
                card.parentElement.style.display = '';
            } else {
                card.parentElement.style.display = 'none';
            }
        });
    }

    catBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            selectedCat = btn.getAttribute('data-filter');
            catBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            updateDisplay();
        });
    });

    yearBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            selectedYear = btn.getAttribute('data-filter');
            yearBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            updateDisplay();
        });
    });

    document.getElementById('reset-filters').addEventListener('click', function() {
        selectedCat = 'all';
        selectedYear = 'all';
        catBtns.forEach(function(b) {
            b.classList.remove('active');
        });
        yearBtns.forEach(function(b) {
            b.classList.remove('active');
        });
        // Set 'All' buttons as active
        document.querySelector('.filter-btn-category[data-filter="all"]').classList.add('active');
        document.querySelector('.filter-btn-year[data-filter="all"]').classList.add('active');
        updateDisplay();
    });
});
</script>
<?php
get_footer();
?>