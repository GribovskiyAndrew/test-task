<?php
/*
	Plugin Name: Tours Plugin
	Description: Tours Plugin
	Version: 1.0
	Author: Andriy
	*/

function create_additional_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'additional_table';

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tour_id int NOT NULL,
        tour_name text NOT NULL,
        tour_category text NOT NULL,
        tour_dates text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

register_activation_hook(__FILE__, 'create_additional_table');



function save_data_to_additional_table($post_id)
{

    if (get_post_type($post_id) === 'tour') {

        global $wpdb;

        $table_name = $wpdb->prefix . 'additional_table';

        $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE tour_id = %d", $post_id);
        $result = $wpdb->get_results($sql);

        $tour_name = get_field('name', $post_id);
        $tour_category = get_field('category', $post_id);
        $tour_dates = get_field('date', $post_id);

        $data = array(
            'tour_id' => $post_id,
            'tour_name' => $tour_name,
            'tour_category' => $tour_category->name,
            'tour_dates' => serialize($tour_dates),
        );

        error_log($result->num_rows);

        if (count($result) > 0) {

            $wpdb->update($table_name, $data, array('tour_id' => $post_id,));
        } else {

            $wpdb->insert($table_name, $data);
        }
    }
}

add_action('acf/save_post', 'save_data_to_additional_table', 20);
