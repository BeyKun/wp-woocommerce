<?php

class User 
{
	protected $users = "";

    function createDB()
    {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$db_roketin = $wpdb->prefix . 'roketin_users';
		$charset_collate = $wpdb->get_charset_collate();
	
		// create the ECPT metabox database table
		if($wpdb->get_var("show tables like '$db_roketin'") != $db_roketin) 
		{
			$sql = "CREATE TABLE " . $db_roketin ." (
				id varchar(50) NOT NULL,
				first_name varchar(20),
				middle_name varchar(20),
				last_name varchar(20),
				email varchar(20),
				company_url text,
				UNIQUE KEY (id)
			) " . $charset_collate;
	 
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}

	function store(){
		$this->users = json_decode($result);
    }

    function getUsers()
	{
		return $this->users;
	}
    
}