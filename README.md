# slim-php-di
REST API Boilerplate using Slim 3, PHP-DI, and Doctrine. Tests are done with Codeception.

# Things to note with this boilerplate
1. Always do composer autoload after making changes to autoload settings in composer.json.
2. Dependency injection is configured in src/dependencies.php. The Slim app uses PHP-DI's container.
3. Authentication is done through JSON Web Tokens.
4. Always use src/settings.php for configuration values needed for other plugins.
5. You should do autowiring in the controller level only. For services, inject their dependencies in their factory functions in src/dependencies.php.
6. The app follows the Controller-Service-Repository pattern, with helpers like Deserializer and Transformers set in place.
7. All database operations should be done in the repository level.
8. Migrations should be in SQL. Craft tables first in SQL clients before copying the resultant SQL to the migration code.

# Things to do
1. Add CSRF middleware
2. Demonstrate role (or scope) middleware
3. Add setups and teardowns to acceptance testing
4. Add unit testing to each level
5. Add logging; query, system, error logs should be created
6. Add validator helpers
7. Implement a proper CRUD (Comments)
8. Implement file handling
