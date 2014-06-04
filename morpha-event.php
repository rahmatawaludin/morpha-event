<?php
/*
Plugin Name: Morpha Event
Plugin URI: http://www.morphaworks.com
Description: Event management for Dunamis Human Capital
Version: 1.0
Author: @rahmatawaludin
Author URI: http://twitter.com/rahmatawaludin
License: GPLv2
Plugin Type: Piklist
*/

/*
Copyright (c) 2014, Rahmat Awaludin

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Check Piklist
add_action('init', 'my_init_function');
function my_init_function()
{
  if(is_admin())
  {
   include_once('class-piklist-checker.php');

   if (!piklist_checker::check(__FILE__))
   {
     return;
   }
  }
}
include('me-post-type-event.php');
include('me-post-type-booking.php');
include('me-taxonomies.php');

/**
 * Add buble counter of total booking
 */
function edit_admin_menus() {
    global $menu, $submenu;
    $query = new WP_Query(
      array(
       'post_type' => array( 'morpha_event_booking')
       ,'post_status' => array( 'draft' )
      )
    );
    $bookings_pending_count = $query->post_count;
    $morpha_event = 'edit.php?post_type=morpha_event';
    $morpha_event_booking = 'edit.php?post_type=morpha_event_booking';

    /**
     * Add Total booking buble in event menu
     */
    foreach ($menu as $key => $menu_nav) {
        if ($menu_nav[2] == $morpha_event) {
            $menu[$key][0] .= ' <span class="update-plugins count-'.$bookings_pending_count.'"><span class="plugin-count">'.$bookings_pending_count.'</span></span>';
        }
    }

    /**
     * Rename All Booking to Bookings
     * Add Total booking buble to Bookings
     */
    foreach ($submenu[$morpha_event] as $key => $submenu_nav) {
        if ($submenu_nav[2] == $morpha_event_booking) {
            $submenu[$morpha_event][$key][0] =
                'Bookings ' . '<span class="update-plugins count-' .
                $bookings_pending_count . '"><span class="plugin-count">' .
                $bookings_pending_count . '</span></span>';
        }
    }
}
/**
 * Implement Admin menu changes
 */
add_action( 'admin_menu', 'edit_admin_menus' );

?>