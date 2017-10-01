<?php

namespace DevMarketer\LaraMongo;

use Illuminate\Support\ServiceProvider;

class MongoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->publishes([
        __DIR__.'/../../config/mongo.php' => config_path('mongo.php'),
      ], 'laramongo');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
			$this->mergeConfigFrom(
        __DIR__.'/../../config/mongo.php', 'laramongo'
	    );
      $this->app->bind('laramongo', function($app)
      {
				$defaultConnection = $config->get("default_connection");

				$uri = config("mongo.connections.$defaultConnection.uri");
				$uriOptions = config("mongo.connections.$defaultConnection.uri_options");
				$driverOptions = config("mongo.connections.$defaultConnection.driver_options");

        return new MongoClient($uri, $uriOptions, $driverOptions, $connection);
      });
    }
}
