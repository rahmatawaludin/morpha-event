<?php
/*
Title: Booking Details
Post Type: morpha_event_booking
*/

/**
 * Event Field
 */
piklist('field', array(
    'type' => 'post-relate'
    ,'scope' => 'morpha_event'
    ,'template' => 'field'
  ));

/**
 * Prefix Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_prefix'
    ,'label' => 'Prefix (i.e Mr., Mrs.)'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * First Name Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_first_name'
    ,'label' => '* First Name'
    ,'attributes' => array(
        'class' => 'text',
        'required'
    )
));

/**
 * Last Name Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_last_name'
    ,'label' => 'Last Name'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Organization Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_organization'
    ,'label' => 'Organization'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Organization Type Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_organization_type'
    ,'label' => 'Organization Type'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Job Title Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_job_title'
    ,'label' => '* Job title'
    ,'attributes' => array(
        'class' => 'text',
        'required'
    )
));

/**
 * City Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_city'
    ,'label' => 'City'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Country Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_country'
    ,'label' => 'Country'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Contact Phone Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_phone'
    ,'label' => '* Contact Phone'
    ,'attributes' => array(
        'class' => 'text',
        'phone',
        'required'
    )
));

/**
 * Mobile Phone Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_phone_mobile'
    ,'label' => '* Mobile Phone'
    ,'attributes' => array(
        'class' => 'text',
        'phone',
        'required'
    )
));

/**
 * Fax Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_fax'
    ,'label' => 'Fax'
    ,'attributes' => array(
        'class' => 'text'
    )
));

/**
 * Email Field
 */
piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'morpha_event_booking_email'
    ,'label' => '* Email Address'
    ,'attributes' => array(
        'class' => 'text',
        'email',
        'required'
    )
));
