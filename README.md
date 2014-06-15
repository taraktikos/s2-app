#Syfmony2 application for test

##Vagrant

##Bundles
* [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) - Adds rest functionality.
* [JMSSerializerBundle](https://github.com/schmittjoh/JMSSerializerBundle)
* [NelmioApiDocBundle](https://github.com/nelmio/NelmioApiDocBundle) - Generates a decent documentation for your APIs.
* [DoctrineFixturesBundle](https://github.com/doctrine/DoctrineFixturesBundle) - Loads data fixtures.

##Tests

```
composer install --dev
```

###Behat
To initialize in new bundle
```
bin/behat --init "@YouBundleName"
```
*Run Bundle Suite*
```
bin/behat "@YouBundleName"
```

###PHPUnit
```
bin/phpunit
bin\phpunit.bat
bin/phpunit src/Acme/ApiBundle //test one bundle
bin\phpunit.bat --coverage-html ./path-to-report-directory //generate report
```

