![laramongo-logo](https://user-images.githubusercontent.com/537329/31087656-1af000ae-a75b-11e7-9b6f-848e0d725e3a.png)

# LaraMongo: MongoDB PHP Driver Integration in Laravel

This package wraps the MongoDB official PHP driver into a facade that can be easy used within Laravel. This means you have access to all the same methods that you will find in the official PHP driver, maintained by MongoDB themselves. The PHP driver does currently lack support for a few native MongoDB commands, and those are being added as well. Not only providing MongoDB PHP Driver support, but also enhancing it with commands such as GeoSpatial commands.

## Installation

Installation is straightforward, setup is similar to every other Laravel Package.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require devmarketer/laramongo
```

#### 2. Define the Service Provider and alias

Next we need to pull in the alias and service providers.

**Note: This package supports the new _auto-discovery_ features of Laravel 5.5, so if you are working on a Laravel 5.5 project, then your install is complete, you can skip to step 3.**

If you are using Laravel 5.0 - 5.4 then you need to add a provider and alias. Inside of your `config/app.php` define a new service provider

```
'providers' => [
	//  other providers

	DevMarketer\LaraMongo\MongoServiceProvider::class,
];
```

Then we want to define an alias in the same `config/app.php` file.

```
'aliases' => [
	// other aliases

	'Mongo' => DevMarketer\LaraMongo\MongoFacade::class,
];
```

#### 3. Publish Config File

The config file is necessary in order to configure the connection settings to your MongoDB installation.

To generate a config file type this command into your terminal:

```
php artisan vendor:publish --tag=laramongo
```

This generates a config file at `config/mongo.php`. Read on, to learn how to setup your connection using this config file (if it isn't clear through the well-documented config file).

## Usage

### Settings

After you have installed everything correctly by following the steps in the **Installation** section above, then you will need to configure a few settings to make sure that the package can connect to your MongoDB installation.

You can configure everything by adding these settings to your `.env` file. If you omit one of these settings from your `.env` file, then these are the values that it defaults to:

```
MONGO_URI=127.0.0.1
MONGO_PORT=27017
MONGO_USERNAME=admin
MONGO_PASSWORD=
MONGO_AUTH_DB=admin
```

Keep the Following in Mind When Setting These Settings:
1. The `MONGO_URI` setting can contain a hostname, IP address, or UNIX domain socket.
1. The default value for `MONGO_URI` is `127.0.0.1` which is equivilant to `localhost`.
1. The `MONGO_PORT` value should be numbers only, do not add a colon to indicate the port, this is handled automatically within the package.
1. If you have not defined a port for your MongoDB database, you can assume that it is the default value set here of `27017`.
1. **IMPORTANT** - by default, this package attempts to authenticate. If for some reason you are not using authentication (such as in a local environment) then either omit `MONGO_USERNAME` from your `.env` file, or set it to `null`. This signals to LaraMongo that you do not want to authenticate. This effectively ignores the values of `MONGO_PASSWORD` and `MONGO_AUTH_DB`, even if you set a value to them.
1. The values set for `MONGO_USERNAME` and `MONGO_PASSWORD` should be normal strings. The LaraMongo package will handle encoding them to the required spec.
1. The `MONGO_AUTH_DB` value should not contain any leading or trailing slashes. Just a simple string that represents the name of the database which contains your authentication information. (This defaults to `admin` and is a reasonable default for most users, and can often be ommitted if you match this standard).

You can also set additional settings in your `.env` file for custom options.

```
MONGO_URI_OPTIONS=
MONGO_DRIVER_OPTIONS=
```

By default no options are passed, but if you would like to customize something, these should be in a string format that can be converted into an array such as `MONGO_URI_OPTIONS='["replicaSet" => "test"]'`.

For all the details on these options and your available options visit:  
[MongoDB PHP Driver - Connection String Options](https://docs.mongodb.com/manual/reference/connection-string/#connection-string-options)

### Documentation

MongoDB PHP Library - Official Documentation
https://docs.mongodb.com/php-library/current/

Remember that this package simply wraps the official MongoDB PHP Library, so you use it in the same way as you would use the main library. Call the `Mongo::get()` facade and then any method you find in the documentation linked above.

### Examples:

This example will get the collection object from the `examplecollect` collection inside of the `testdb` Database. The second line uses that collection object and gets everything out of it and converts it to an array for use inside of PHP.

    $collection = Mongo::get()->testdb->sample;
    return $collection->find()->toArray();

## Contribute

I encourage you to contribute to this package to improve it and make it better. Even if you don't feel comfortable with coding or submitting a pull-request (PR), you can still support it by submitting issues with bugs or requesting new features, or simply helping discuss existing issues to give us your opinion and shape the progress of this package.

[Read the full Contribution Guide](https://github.com/DevMarketer/LaraMongo/blob/master/CONTRIBUTING.md)

## Contact

I would love to hear from you. I run the DevMarketer channel on YouTube, where we discuss how to _"Build and Grow Your Next Great Idea"_ please subscribe and check out the videos.

I am always on Twitter, and it is a great way to communicate with me or follow me. [Check me out on Twitter](https://twitter.com/_jacurtis).

You can also email me at hello@jacurtis.com for any other requests.
