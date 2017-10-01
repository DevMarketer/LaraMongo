<?php
/**
 * This file is part of the LaraMongo Package,
 * a wrapper for native Mongo PHP Library with additional extensions.
 *
 * @license MIT
 * @package LaraMongo
 */
return [
		/*
		|--------------------------------------------------------------------------
		| Default MongoDB Connection Name
		|--------------------------------------------------------------------------
		|
		| Here you may specify which of the MongoDB connections below you wish
		| to use as your default connection for all LaraMongo work. Of course
		| you may use many connections by defining the connection() on any
		| queries that intend to use another connection other than this default
		|
		*/
    'default_connection' => env('MONGO_CONNECTION', 'primary'),

		/*
    |--------------------------------------------------------------------------
    | MongoDB Connections
    |--------------------------------------------------------------------------
    |
    | Out of the box, LaraMongo supports multiple MongoDB connections.
    | This is useful if you have multiple MongoDB databases you want to
    | connect to or switch between.
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */
		'connections' => [

				'primary' => [
						'uri' => env('MONGO_URI', '127.0.0.1'), // only specify the domain or IP address
						'port' => env('MONGO_PORT', '27017'), // do not add a colon before the port number
						'username' => env('MONGO_USERNAME', null), // set to null to skip authentication
						'password' => env('MONGO_PASSWORD', ''),
						'auth_db' => env('MONGO_AUTH_DB', 'admin'),
						'uri_options' => env('MONGO_URI_OPTIONS', []),
						'driver_options' => env('MONGO_DRIVER_OPTIONS', []),
				]
		]
];
