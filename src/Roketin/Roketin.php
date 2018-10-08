<?php

defined('ABSPATH') or die('Oppss! you can not access this file');

class Roketin
{
	function __construct()
	{

	}

	function activate()
	{
		$this->createDB();
	}

	function deactivate()
	{
		flush_rewrite_rules();
	}



	function login($username, $password)
	{
		$cilent = new GuzzleHttp\Client();

		$response = $cilent->request(
			'POST',
			'http://r-auth.roketin.xyz/api/v2/auth/login',
			[
				'form_params' => [
					'email' => $username,
					'password' => $password,
					'remember' => 'on'
				]
			]
		);
		
		$headers = $response->getHeaders();
		$body = $response->getBody();
		$result =  $response->getBody()->getContents();
		

		return $result;
    }

    function cekUserLogin($halo) {
		echo $halo;
	}
}

if (class_exists('Roketin')) {
    $roketin = new Roketin();
}


//activation
// register_activation_hook(__FILE__, array($roketin, 'activate'));
add_action( 'plugins_loaded', array($roketin, 'activate') );

//deactivation
// register_deactivation_hook(__FILE__, array($roketin, 'deactivate'));

//uninstall
// register_uninstall_hook(__FILE__, array($roketin, 'uninstall'));

