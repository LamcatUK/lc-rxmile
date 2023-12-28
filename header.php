<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    if (get_field('ga_property', 'options')) {
        ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
    }
    if (get_field('gtm_property', 'options')) {
        ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?=get_field('gtm_property', 'options')?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <?php
    }
    if (get_field('google_site_verification', 'options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
    }
    if (get_field('bing_site_verification', 'options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
    }
?>
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2614397218698886');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none"
            src="https://www.facebook.com/tr?id=2614397218698886&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <?php wp_head(); ?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "RxMile",
            "legalName": "Zek Tech LLC",
            "url": "https://www.rxmile.com/",
            "logo": "https://www.rxmile.com/wp-content/uploads/2022/03/RxMile-Logo.png",
            "foundingDate": "2022",
            "founders": [{
                "@type": "Person",
                "name": "Kunal Vyas"
            }],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "320 W Sabal Palm Ste 300",
                "addressLocality": "Longwood",
                "addressRegion": "Orlando, Florida",
                "postalCode": "32803",
                "addressCountry": "USA"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "customer support",
                "telephone": "[270 4796 453]",
                "email": "inquiries@rxmile.com"
            },
            "sameAs": [
                "https://www.facebook.com/RxMileSaaS",
                "https://www.linkedin.com/company/rxmile/",
                "https://www.youtube.com/@rxmile2497"
            ]
        }
    </script>

</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php do_action('wp_body_open'); ?>
    <div class="site" id="page">
        <nav id="main-nav" class="fixed-top navbar navbar-expand-lg d-block px-0 py-3" aria-labelledby="main-nav-label">
            <div class="container-xl d-flex justify-content-between">
                <a href="/" class="navbar-brand" rel="home"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>"><i
                        class="fa fa-navicon"></i></button>
                <?php
            wp_nav_menu(
                array(
'theme_location'  => 'primary_nav',
'container_class' => 'collapse navbar-collapse',
'container_id'    => 'navbarNavDropdown',
'menu_class'      => 'navbar-nav w-100 justify-content-around align-items-lg-center mt-2 mt-lg-0',
'fallback_cb'     => '',
'menu_id'         => 'main-menu',
'depth'           => 2,
'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
)
            );
?>
                <div class="d-none d-lg-inline">
                    <?php
if (get_field('header_button', 'options')) {

    $l = get_field('header_button', 'options');
    ?>
                    <span type="button" class="btn-navbar--outline me-2" data-bs-toggle="modal"
                        data-bs-target="#choiceModal">
                        Book Demo
                    </span>
                    <?php
}
?>
                    <a href="https://tracker.rxmile.com/" class="btn-navbar">Login</a>
                </div>
            </div>
        </nav>