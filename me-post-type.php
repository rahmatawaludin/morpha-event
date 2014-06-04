<?php
// Register custom post type
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
      'author'
      ,'title'
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
?>