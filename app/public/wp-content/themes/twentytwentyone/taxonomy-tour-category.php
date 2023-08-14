<?php
get_header();

$current_category = get_queried_object();

global $wpdb;
$custom_table = $wpdb->prefix . 'additional_table';

$current_category = get_queried_object();

echo '<h2>' . $current_category->slug . '</h2>';

$tours_query = $wpdb->prepare("
    SELECT t.* 
    FROM local.{$wpdb->prefix}additional_table AS t
    WHERE t.tour_category = '{$current_category->slug}'");

$tours = $wpdb->get_results($tours_query);

if ($tours) {
    $upcoming_tours = array();
    $past_tours = array();

    foreach ($tours as $tour) {

        $dates = unserialize($tour->tour_dates);

        if (!empty($dates)) {

            $date_list = array();

            foreach ($dates as $date) {

                array_push($date_list, $date['date_value']);
            }

            sort($date_list);
            $todayDate = new DateTime();

            $flag = false;

            foreach ($date_list as $date_value) {
                $targetDate = DateTime::createFromFormat('d/m/Y', $date_value);

                if ($targetDate >= $todayDate) {
                    $upcoming_tours[] = array(
                        'name' => esc_html($tour->tour_name),
                        'date' => $targetDate,
                    );

                    $flag = true;

                    break;
                }
            }

            if ($flag == false) {
                $past_tours[] = array(
                    'name' => esc_html($tour->tour_name),
                    'date' => '',
                );
            }
        } else {

            $past_tours[] = array(
                'name' => esc_html($tour->tour_name),
                'date' => '',
            );
        }
    }

    usort($upcoming_tours, function ($a, $b) {
        return $a['date'] <=> $b['date'];
    });

    echo '<ul class="tour-list">';
    foreach ($upcoming_tours as $tour) {
        echo '<li>';
        echo '<h2>' . $tour['name'] . '</h2>';
        echo '<p>' . $tour['date']->format('d/m/Y') . '</p>';
        echo '</li>';
    }
    foreach ($past_tours as $tour) {
        echo '<li>';
        echo '<h2>' . $tour['name'] . '</h2>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No upcoming tours in this category.</p>';
}

get_footer();
