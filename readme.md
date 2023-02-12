# UofSC Nutrient Study
This project is a for the SWITCH research study by the University of South Carolina. It involves the Comprehensive Food Database that can be seen [here](https://github.com/lxaw/ComprehensiveFoodDatabase).

We later modified this boilerplate version and adjusted it for our needs. It is now archived as an example. Note that this code is not finalized; it is merely to show an example of what you can do with the [Comprehensive Food Database](https://github.com/lxaw/ComprehensiveFoodDatabase).

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

### Example Images
![image](https://user-images.githubusercontent.com/77286027/218330296-3a06a022-6e7a-4c67-8aaf-98700f6d65a6.png)
Food search page (without entry)

![image](https://user-images.githubusercontent.com/77286027/218330305-2f84ea87-5094-4b6e-ba0b-7c383222d1ec.png)
Food search page (with entry)

![image](https://user-images.githubusercontent.com/77286027/218330353-9c9426e8-9c3b-48eb-94c4-1b4d875a5fa4.png)
Clicking a food. Nutrients and image show.

![image](https://user-images.githubusercontent.com/77286027/218330404-6cca7b47-232e-4830-b2e4-0e9476b1658c.png)
Note that you can also see different portions. Here is one for tbsp.

![image](https://user-images.githubusercontent.com/77286027/218330416-326ba8e6-7d71-40cd-b9ef-b8bd41d70594.png)
... and one for cup.

![image](https://user-images.githubusercontent.com/77286027/218330443-2d8b1202-1ab5-4f80-935e-69628a78a717.png)
When add a food, it goes to `Stored Foods`. Here is the top half of the screen.

![image](https://user-images.githubusercontent.com/77286027/218330484-cf3c9090-e757-4822-8133-dc9427a443fc.png)
... and here is the bottom. I had to zoom out a bit to fit it all. There are dynamic graphs that adjust to nutrition amounts.

![image](https://user-images.githubusercontent.com/77286027/218330557-a297f049-c5a9-42c1-bbad-6313d4bd938f.png)
When done entering foods, can submit them to store them to your user. I am not a front-end developer, so I leave the beautification of the "Successfully saved foods" to the reader as homework.

![image](https://user-images.githubusercontent.com/77286027/218330595-1b838776-e59f-41a1-b88b-d761cdb8739e.png)
Going to the "Food" page, you can see a calendar with your entered foods. If you click a calendar date you can see what you ate that day. Let's click today.

![image](https://user-images.githubusercontent.com/77286027/218330633-f9a6adf0-756b-43f7-b45c-cbb1aa32d7d3.png)
Here are the pie charts for all the items we ate today. This is the first half of the page.

[Screencast from 02-12-2023 01:47:27 PM.webm](https://user-images.githubusercontent.com/77286027/218330685-828a6ad9-ed86-4307-982e-d803983114f3.webm)
And here is the second half. You can scroll to see the foods.




