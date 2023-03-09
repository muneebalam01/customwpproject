<?php 

add_action( 'rest_api_init', 'techiepress_add_callback_url_endpoint' );

function techiepress_add_callback_url_endpoint(){
    register_rest_route(
        'techiepress/v1/', // Namespace
        'receive-callback', // Endpoint
        array(
            'methods'  => 'POST',
            'callback' => 'techiepress_receive_callback'
        )
    );
}


function techiepress_receive_callback( $request_data ) {
    $data = array();
    
    $parameters = $request_data->get_params();
    
    $name     = $parameters['name'];
    $password = $parameters['password'];
    
    if ( isset($name) && isset($password) ) {
        
        $data['status'] = 'OK';
    
        $data['received_data'] = array(
            'name'     => $name,
            'password' => $password,
        );
        
        $data['message'] = 'You have reached the server';
        
    } else {
        
        $data['status'] = 'Failed';
        $data['message'] = 'Parameters Missing!';
        
    }
    
    //return $data;
    print_r($data);
}