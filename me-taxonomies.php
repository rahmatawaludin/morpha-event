<?php
// register custom taxonomy category
add_filter('piklist_taxonomies', 'morpha_event_type_category');
 function morpha_event_type_category($taxonomies)
 {
   $taxonomies[] = array(
      'post_type' => 'morpha_event'
      ,'name' => 'morpha_event_category'
      ,'show_admin_column' => true
      ,'hide_meta_box' => false
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Category')
        ,'show_ui' => true
        ,'show_admin_column'=>false
        ,'query_var' => true
        ,'rewrite' => array(
          'slug' => 'event-category'
        )
      )
    );
return $taxonomies;
}

// register custom taxonomy location
add_filter('piklist_taxonomies', 'morpha_event_type_location');
 function morpha_event_type_location($taxonomies)
 {
   $taxonomies[] = array(
      'post_type' => 'morpha_event'
      ,'name' => 'morpha_event_location'
      ,'show_admin_column' => true
      ,'hide_meta_box' => false
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Location')
        ,'show_ui' => true
        ,'show_admin_column'=>false
        ,'query_var' => true
        ,'rewrite' => array(
          'slug' => 'event-location'
        )
      )
    );
return $taxonomies;
}
?>