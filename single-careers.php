<?php
/**
 * The Template for displaying career posts.
 *
 * @package packagename
 */

get_header();
?>
<main id="main" class="padding-top">
<?php while ( have_posts() ) : the_post(); ?>
<div class="container pb-5">
    <div class="page-meta">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
    </div>
    <h1 class="mb-5"><span class="section-title"><?php echo get_the_title(); ?></span></h1>
    <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
            <div class="bg-light-grey p-2 h-100">
                <div class="job-feature-title">Employment Type</div>
                <div class="job-feature"><?php 
                    $emp = array(
                        'FULL_TIME' => 'Full time',
                        'PART_TIME' => 'Part time',
                        'CONTRACTOR' => 'Contract',
                        'TEMPORARY' => 'Temporary',
                        'INTERN' => 'Intern',
                        'VOLUNTEER' => 'Volunteer',
                        'PER_DIEM' => 'Per diem',
                        'OTHER' => 'Other'
                    );
                    echo $emp[ get_field('employment_type') ];
                ?></div>
                <div class="job-feature-title">Salary</div>
                <div class="job-feature">
                <?php
                    $baseSalary = '';
                    if ( have_rows('base_salary') ) {
                        while (have_rows('base_salary')) {
                            the_row();
                            if (get_sub_field('text')) {
                                echo get_sub_field('text');
                            }
                            else {
                                while (have_rows('numeric_salary')) {
                                    the_row();
                                    echo '$' . number_format(get_sub_field('minValue'));
                                    $baseSalary = get_sub_field('minValue');
                                    $per = get_sub_field('QuantitativeValue');
                                    if (get_sub_field('maxValue')) {
                                        echo ' - $' . number_format(get_sub_field('maxValue'));
                                    }
                                    echo ' per ' . strtolower(get_sub_field('QuantitativeValue'));
                                }
                            }
                        }
                    }
                ?></div>
                <?php
                if (get_field('office')) {
                    ?>
                    <div class="job-feature-title">Location</div>
                    <?php
                    $locas = array();
                    foreach (get_field('office') as $o) {
                        // $loca = get_term_by('id', $o, 'locations');
                        // array_push($locas, $loca->name);
                        array_push($locas, $o->name);
                    }
                    echo '<div class="job-feature">' . implode(', ', $locas) . '</div>';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-9">
            <?php

                $banner = get_field('banner');
                if ($banner) {
                    echo '<div class="larger pb-4">' . $banner . '</div>';
                }

                $role = get_field('purpose');
                if($role) {
                    echo '<h2>Role Purpose</h2>';
                    echo '<div class="pb-2">' . $role . '</div>';
                }
            ?>

            <h2>Key Responsibilities</h2>
            <?php

                $res = get_field('responsibilities');
                foreach ($res as $r) {
                    echo '<div class="responsibility">' . $r['responsibility'] . '</div>';
                }


                $skills = get_field('skills');
                if ($skills) {
                    echo '<h2 class="pt-2">Skills and Experience</h2>';
                    foreach ($skills as $s) {
                        echo '<div class="skill">' . $s['skill'] . '</div>';
                    }
                }
            ?>

            <div class="py-2">
            <?php
                echo get_field('contact_details');
            ?>
            </div>

        </div>
    </div>
</div>

<script type="application/ld+json">
    {
      "@context" : "https://schema.org/",
      "@type" : "JobPosting",
      "title" : "<?php echo get_the_title(); ?>",
      "description" : "<p><?php echo get_the_title(); ?></p>",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "RxMile",
        "logo": "https://www.rxmile.com/wp-content/themes/lc-rxmile/img/rxmile-square.png",
        "sameAs": "https://www.rxmile.com/"
      },
      "datePosted" : "<?php echo get_the_date(); ?>",
      "validThrough" : "2030-01-01T00:00",
      "employmentType" : "<?php echo get_field('employment_type'); ?>",
      "jobLocation": {
        "@type": "Place",
        <?php
        $loca = get_field('office');
        echo $loca[0]->description;
        ?>
      }
      <?php
      if ($baseSalary != '') {
          ?>
        ,"baseSalary": {
            "@type": "MonetaryAmount",
            "currency": "USD",
            "value": {
                "@type": "QuantitativeValue",
                "value": <?=$baseSalary?>,
                "unitText": "<?=$per?>"
            }
        }
        <?php
      }
      ?>
    }
    </script>

<?php endwhile; // end of the loop. ?>
    <!-- main content column -->
</main>
<?php

get_footer();


