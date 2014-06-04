<?php
/**
 * Register custom post type - Booking
 */
add_filter('piklist_post_types', 'morpha_event_booking_post_type');
 function morpha_event_booking_post_type($post_types)
 {
  $post_types['morpha_event_booking'] = array(
    'labels' => piklist('post_type_labels', 'Bookings')
    ,'title' => __('Enter a new Booking')
    ,'show_in_menu'  => 'edit.php?post_type=morpha_event'
    ,'public' => true
    ,'rewrite' => array(
      'slug' => 'event'
    )
    ,'supports' => array(
    )
    ,'hide_meta_box' => array(
      'slug'
      ,'author'
      ,'revisions'
      ,'comments'
      ,'commentstatus'
      ,'pyre_post_options' // avada metabox
      ,'sbg_box'
    )
    ,'status' => array(
      'draft' => array(
        'label' => 'Waiting Confirmation'
      ),
      'confirmed' => array(
        'label' => 'Confirmed'
      ),
    )
  );
return $post_types;
}

/**
 * Register custom admin field
 */
add_filter('manage_morpha_event_booking_posts_columns', 'morpha_event_booking_table_head');
function morpha_event_booking_table_head( $defaults ) {
    $defaults['booking_email']          = 'Email';
    $defaults['booking_contact_phone']  = 'Contact Phone';
    $defaults['booking_mobile_phone']   = 'Mobile Phone';
    return $defaults;
}

/**
 * Fill custom field value
 */
add_action('manage_morpha_event_booking_posts_custom_column', 'morpha_event_booking_table_content', 10, 2);

// Filter for title
add_filter('the_title', 'morpha_event_booking_title',10, 2);
function morpha_event_booking_title($title, $id) {
  if(get_post_type($id) == 'morpha_event_booking') {
      return get_post_meta( $id, 'morpha_event_booking_prefix', true ) .
      ' ' . get_post_meta( $id, 'morpha_event_booking_first_name', true ) .
      ' ' . get_post_meta( $id, 'morpha_event_booking_last_name', true );
   }
  else {
      return $title;
  }
}

// custom field
function morpha_event_booking_table_content( $column_name, $post_id ) {

  switch ($column_name) {
    case 'booking_email':
      $email = get_post_meta( $post_id, 'morpha_event_booking_email', true );
      echo $email;
      break;

    case 'booking_contact_phone':
      $contact_phone = get_post_meta( $post_id, 'morpha_event_booking_phone', true );
      echo $contact_phone;
      break;

    case 'booking_mobile_phone':
      $mobile_phone = get_post_meta( $post_id, 'morpha_event_booking_phone_mobile', true );
      echo $mobile_phone;
      break;
  }
}

// change quick edit to custom status
add_action('admin_head', 'change_quick_edit_status', 10, 2);
function change_quick_edit_status() {
  global $post_type, $pagenow;
  if ($post_type == 'morpha_event_booking' && $pagenow = 'edit.php') {
    // enqueue script to fix display
    wp_enqueue_script( 'booking-status', plugins_url( 'js/booking-status.js' , __FILE__ ), array(), '1.0.0', true );
  }
}

/**
 * @todo: searching by title still not working, it should search by all booking meta
 *
 */
?>