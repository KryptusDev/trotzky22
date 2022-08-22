<?php

function sidebar_menu_shortcode($atts = array(), $content = null)
{
    extract(shortcode_atts(array(
        'gruppe' => null
    ), $atts));


    $output = '
    <div class="sidebar-nav-container sticky-top">
        <ul id="' . $cat . '-sidebar-menu" class="list-group">';

    $args = array('category' => get_category_by_slug($gruppe)->term_id, 'post_type' =>  'post', 'ordee' => 'ASC');
    $postslist = get_posts($args);

    foreach ($postslist as $post) {
        $output .= '<a class="list-group-item depth-0" href="' . get_permalink($post) . '">' . get_the_title($post) . '</a>';
    }

    $output .= '
        </ul>
    </div>';

    return $output;
}
add_shortcode('sidebar-menu', 'sidebar_menu_shortcode');


function secondary_nav_shortcode($atts = array(), $content = null)
{
    extract(shortcode_atts(array(
        'kategorie' => null
    ), $atts));

    $output = '
    <nav id="navbar-scroll" class="navbar navbar-expand-md navbar-dark bg-revo-red sticky-top">
    <div class="container">
    <a class="navbar-brand" href="' . esc_url(home_url()) . '" title="' . esc_attr(get_the_title()) . '" rel="home">';
    $header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

    if (!empty($header_logo)) {
        $output .= '<img src="' . esc_url($header_logo) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" />';
    } else {
        $output .= esc_attr(get_the_title());
    }

    $output .= '</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-scroll-nav" aria-controls="navbar-scroll-nav" aria-expanded="false" aria-label="' . esc_attr('Toggle navigation', 'trotzky22') . '">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbar-scroll-nav" class="collapse navbar-collapse">';

    // Loading WordPress Custom Menu (theme_location).
    /* $output .= */ /* $wp_nav_menu(
            array(
                'theme_location' => $kategorie,
                'container'      => '',
                'menu_class'     => 'navbar-nav ms-auto',
                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                'walker'         => new WP_Bootstrap_Navwalker(),
                'echo'           => false,
            )
        ); */

    $output .= wp_nav_menu(
        array(
            'menu' => $kategorie,
            'container' => '',
            'theme_location' => $kategorie,
            'depth' => 3,
            'menu_class' => 'navbar-nav ms-auto',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker_Hideactive(),
            'echo' => false

        )
    );
    $output .= '</div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
    </nav>
    <div id="stickyNavPlaceholder"></div>';

    return $output;
}
add_shortcode('untere-navigation', 'secondary_nav_shortcode');
