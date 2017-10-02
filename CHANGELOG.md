# LaraMongo Change Log

All features, bug fixes, and changes in the code base will be updated and documented here with each release.

## Version 1: Official Release

##### 1.1 (Dev)

1. You can now configure the database you want to use.
	1. To **GET** the current database use the `$db` property like `Mongo::db`
	1. To **SET** the database use the `db()` method like `Mongo::db('test')`
1. The `$client` property is now public (was private). I also created a method `client()` which both return the Mongo client object. They can be used interchangeably. This will replace the `get()` method.

##### 1.0

This update is the primary update for the package, which includes the base functionality intended for it. With this you have access to create a Mongo client and have access to all of the PHP MongoDB Library methods through the easy to use `Mongo` facade.

There are more features coming. But this is the start of a great thing.

Add an issue on github if you want to see anything else with this package. There are some features on the roadmap I hope to add soon.

##### 0.1 (Beta)

This update focuses on the core of LaraMongo, creating the service provider, facade, and dependencies needed to establish the base functionality of the package for future development.

**New Features:***

1. Config file publishes under 'laramongo' tag
1. Env vars used to configure mongodb connection
1. `get()` method returns client object
1. `MongoDB/MongoDB` library included as dependency
1. Auto-discovery feature of Laravel 5.5 supported
1. `Mongo::method()` facade configured to pass driver methods
