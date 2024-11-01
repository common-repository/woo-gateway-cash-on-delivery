<?php
/*
 * Exit if file accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shipping_methods = array();

if ( is_admin() ) {
	foreach ( WC()->shipping()->load_shipping_methods() as $method ) {
		$title = empty( $method->method_title ) ? ucfirst( $method->id ) : $method->method_title; 
        $shipping_methods[ strtolower( $method->id ) ] = esc_html( $title ); 
	}
}

return array(
	'enabled' => array(
		'title' 	=> __( 'Enable/Disable', 'woo-gateway-delivery' ),
		'type' 		=> 'checkbox',
		'label' 	=> __( 'Enable Cash on Delivery', 'woo-gateway-delivery' ),
		'default' 	=> 'yes'
	),
	'title' => array(
		'title' 		=> __( 'Title', 'woo-gateway-delivery' ),
		'type' 			=> 'text',
		'description' 	=> __( 'This controls the title which the user sees during checkout.', 'woo-gateway-delivery' ),
		'default' 		=> __( 'Cash on Delivery', 'woo-gateway-delivery' ),
		'desc_tip'   	=> true,
	),
	'description' => array(
		'title'       	=> __( 'Description', 'woo-gateway-delivery' ),
		'type'       	=> 'textarea',
		'description' 	=> __( 'Payment method description that the customer will see on your checkout.', 'woo-gateway-delivery' ),
		'default'     	=> __( 'Please indicate whether you will need to change...', 'woo-gateway-delivery' ),
		'desc_tip'    	=> true,
	),
	'notice' => array(
		'title'       	=> __( 'Notice', 'woo-gateway-delivery' ),
		'type'       	=> 'textarea',
		'description' 	=> __( 'Description informing the client does not need to change.', 'woo-gateway-delivery' ),
		'default'     	=> __( '*Enter 0 to inform you that do not need to change.', 'woo-gateway-delivery' ),
		'desc_tip'    	=> true,
	),
	'enable_for_methods' => array(
		'title'             => __( 'Enable for shipping methods', 'woo-gateway-delivery' ),
		'type'              => 'multiselect',
		'class'             => 'wc-enhanced-select',
		'css'               => 'width: 450px;',
		'default'           => '',
		'description'       => __( 'If Cash on Delivery is only available for certain methods, set it up here. Leave blank to enable for all methods.', 'woo-gateway-delivery' ),
		'options'           => $shipping_methods,
		'desc_tip'          => true,
		'custom_attributes' => array(
			'data-placeholder' => __( 'Select shipping methods', 'woo-gateway-delivery' )
		)
	),
);