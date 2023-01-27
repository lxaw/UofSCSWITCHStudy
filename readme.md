# UofSC Nutrient Study
This project is a for the SWITCH research study by the University of South Carolina. It involves the Comprehensive Food Database that can be seen [here](https://github.com/lxaw/ComprehensiveFoodDatabase).

This project uses the PHP library [Symfony](https://symfony.com/).

To run, be sure to install [Symfony](https://symfony.com/doc/current/setup.html)  and [Composer](https://getcomposer.org/download/).

In general, please follow [this](https://symfony.com/doc/current/setup.html#setting-up-an-existing-symfony-project) to set up the project.

You will need to get all the composer packages. Do this by running
`composer update` followed by `composer install`
NOTE: You may need PHP's xml extension. Install with `sudo apt-get install php-xml` and then restart apache with `sudo service apache2 restart` [see here](https://stackoverflow.com/questions/38793676/php-xml-extension-not-installed).
NOTE: You may be able to bypass any issues with `composer update` by running `composer install --ignore-platform-reqs`. This is not recommended, however.
To make this go faster, install php-curl with `sudo apt install php-curl`.

## VS Code extensions
The following are useful extensions for this project. 
- PHP Intelephense
- PHPDoc Comment (CTRL + Shift + i to add DocBlocks)
- PHP Namespace Resolver
- HTML Snippets
- JavaScript Code Snippets
- Symfony Code Snippets
- Symfony for VSCode
- Twig
- Twig Language 2
- Twig Language
- Emmet Live

## Running
To run the project, run
`symfony server:start -d`

If you run into any problems with the database, make sure you have doctrine:
`composer require doctrine`

You will also likely need to make migrations.
`php bin/console make:migration`
`php bin/console doctrine:migrations:migrate`


You will need to build the assets using `npm`. 
Make sure you have all of the required npm assets by running `npm i`.

There has been an error with the latest versions of `npm`. See [this](https://stackoverflow.com/questions/74755973/npm-run-build-syntaxerror-unexpected-token-symfony-5-4-19?noredirect=1#comment131940994_74755973). 

You may need to switch node versions to version 16. You should also have `nvm`. Install following [here](https://www.linode.com/docs/guides/how-to-install-use-node-version-manager-nvm/)

Now to install node 16:
`nvm install 16`

Now you should be able to run `npm run build`.