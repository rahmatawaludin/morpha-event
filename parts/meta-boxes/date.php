<?php
/*
Title: Event Date
Post Type: morpha_event
Context: side
Priority: high
*/

/**
 * Begin date field
 */
piklist('field',
    array(
        'type' => 'datepicker',
        'scope' => 'post_meta', // Not used for settings sections,
        'field' => 'morpha_event_date_begin',
        'label' => 'Pick Begin Date',
        'attributes' => array(
            'class' => 'text',
            'required'
        ),
        'options' => array(
           'dateFormat' => 'M d, yy',
           'firstDay' => '0'
        )
    )
);

/**
 * Finish date field
 */
piklist('field',
    array(
        'type' => 'datepicker',
        'scope' => 'post_meta', // Not used for settings sections,
        'field' => 'morpha_event_date_finish',
        'label' => 'Pick Finish Date',
        'attributes' => array(
            'class' => 'text'
        ),
        'options' => array(
           'dateFormat' => 'M d, yy',
           'firstDay' => '0'
        )
    )
);
