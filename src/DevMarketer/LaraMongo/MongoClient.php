<?php

namespace DevMarketer\LaraMongo;

use MongoDB\Client;

class MongoClient
{
	/**
  	* The MongoDB Client Object.
  	*
  	* @var MongoDB\Client
  	*/
	private $client;

	/**
		* The current connection Mongo is using.
		*
		* @var string
		*/
	public $connection;


	/**
	 * Construct a new MongoClient instance
	 *
	 * @param string	$uri
 	 * @param array		$uriOptions
	 * @param array		$driverOptions
	 * @param string	$connection
	 */
	public function __construct($uri, $uriOptions, $driverOptions, $connection)
	{
			$this->connection = $connection;
			$mHost = $this->validate($uri, null);
			$mUri = $this->createUri($mHost);
			$mUriOptions = $this->validate($uriOptions, [], true);
			$mDriverOptions = $this->validate($driverOptions, [], true);

			$this->client = new Client($mUri, $mUriOptions, $mDriverOptions);
	}

	/**
	 * Validate the value and optionally return a default value
	 *
	 * @param 			$val
 	 * @param 			$default
	 * @param bool	$json
	 */
	private function validate($val, $default, $json = false) {
		if (!empty($val) && is_string($val)) {
			if ($json) {
				return json_decode($val, true);
			}
			return $val;
		}
		return $default;
	}

	/**
	 * Create the mongoDb uri format as explained here
	 * https://docs.mongodb.com/manual/reference/connection-string/#standard-connection-string-format
	 *
	 * @param string	$host
	 * @todo add support for replica sets and sharded clusters
	 */
	private function createUri($host) {
		$configShort = "mongo.connections.$this->connection.";
		$username = config($configShort."username");
		$password = config($configShort."password");
		$port = config($configShort."port");
		$authDb = ($username ? config($configShort."auth_db") : '');
		$auth = '';
		if ($username) $auth = rawurlencode($username).':'.rawurlencode($password).'@';
		return sprintf("mongodb://%s%s:%s/%s", $auth, $host, $port, $authDb);
	}


	/**
   * Get the mongo object.
   *
   */
  public function get()
  {
		return $this->client;
  }

}
