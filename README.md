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

__... coming soon ...__

## Contribute

I encourage you to contribute to this package to improve it and make it better. Even if you don't feel comfortable with coding or submitting a pull-request (PR), you can still support it by submitting issues with bugs or requesting new features, or simply helping discuss existing issues to give us your opinion and shape the progress of this package.

[Read the full Contribution Guide](https://github.com/DevMarketer/LaraMongo/blob/master/CONTRIBUTING.md)

## Contact

I would love to hear from you. I run the DevMarketer channel on YouTube, where we discuss how to _"Build and Grow Your Next Great Idea"_ please subscribe and check out the videos.

I am always on Twitter, and it is a great way to communicate with me or follow me. [Check me out on Twitter](https://twitter.com/_jacurtis).

You can also email me at hello@jacurtis.com for any other requests.
