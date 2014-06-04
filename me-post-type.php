<?php
/**
 * Register custom post type
 */
add_filter('piklist_post_types', 'morpha_event_post_type');
 function morpha_event_post_type($post_types)
 {
  $post_types['morpha_event'] = array(
    'labels' => piklist('post_type_labels', 'Event')
    ,'title' => __('Enter a new Event Title')
    ,'public' => true
    ,'menu_icon' => plugins_url('img/calendar-16.png', __FILE__)
    ,'rewrite' => array(
      'slug' => 'event'
    )
    ,'supports' => array(
      'author',
      'title'
    )
    ,'hide_meta_box' => array(
      'slug'
      ,'author'
      ,'revisions'
      ,'comments'
      ,'commentstatus'
      ,'pyre_post_options' // avada metabox
      ,'sbg_box'
      ,'morpha_event_categorydiv' // default category metabox, we will replace it with select
      ,'morpha_event_locationdiv' // default location metabox, we will replace it with select
    )
  );
return $post_types;
}

/**
 * Register custom admin field
 */
add_filter('manage_morpha_event_posts_columns', 'bs_event_table_head');
function bs_event_table_head( $defaults ) {
    $defaults['event_date']       = 'Event Date';
    $defaults['event_category']   = 'Category';
    $defaults['event_location']   = 'Location';
    $defaults['author']           = 'Added By';
    return $defaults;
}

/**
 * Fill custom field value
 */
add_action('manage_morpha_event_posts_custom_column', 'morpha_event_table_content', 10, 2);
function morpha_event_table_content( $column_name, $post_id ) {

  // Fill event_date
  if ($column_name == 'event_date') {
    $begin_date = get_post_meta( $post_id, 'morpha_event_date_begin', true );
    $finish_date = get_post_meta( $post_id, 'morpha_event_date_finish', true );
    if ($begin_date == $finish_date) {
      echo $begin_date;
    } else {
      echo $begin_date . " - " . $finish_date;
    }
  }

  // Fill event_category
  if ($column_name == 'event_category') {
    $event_categories = wp_get_post_terms( $post_id, 'morpha_event_category');

    foreach ($event_categories as $key => $event_category) {
      if ($key > 0) {
        echo ', ';
      }
      echo $event_category->name;
    }
  }

  // Fill event_location
  if ($column_name == 'event_location') {
    $event_locations = wp_get_post_terms( $post_id, 'morpha_event_location');

    foreach ($event_locations as $key => $event_location) {
      if ($key > 0) {
        echo ', ';
      }
      echo $event_location->name;
    }
  }
}

?>