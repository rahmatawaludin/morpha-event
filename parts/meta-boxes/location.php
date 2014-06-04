<?php
/*
Title: Event Location
Post Type: morpha_event
*/

// display category as select
piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'morpha_event_location`'
    ,'label' => 'Locations'
    ,'description' => 'Location will appear when they are added to this field.'
    ,'choices' => piklist(
      get_terms('morpha_event_location', array(
        'hide_empty' => false
      ))
      ,array(
        'term_id'
        ,'name'
      )
    )
  ));
?>