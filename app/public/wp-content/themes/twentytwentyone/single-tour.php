<?php

/**
 * The template for displaying tour single posts
 */


get_header();

while (have_posts()) : the_post();


    $tour_name = get_field('name');
    $tour_description = get_field('description');
    $tour_dates = get_field('date');

    echo '<h1>' . get_the_title() . '</h1>';
    echo '<h2>' . $tour_name . '</h2>';
    echo '<p>' . $tour_description . '</p>';

    echo '<ul class="date-list">';
    foreach($tour_dates as $date){
        echo '<li>';
        echo '<p>' . $date['date_value'] . '</p>';
        echo '</li>';
    }
    echo '</ul>';

endwhile;

get_footer();
