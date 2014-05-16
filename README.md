Yii2 Action Log
===============
Logs user actions like create, read, update, delete and custom

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

    php composer.phar require --prefer-dist cakebake/yii2-actionlog "dev-master"

or add

    "cakebake/yii2-actionlog": "dev-master"

to the require section of your `composer.json` file.

Post-Installation
------------

Check your database settings and run migration from your console:

    php yii migrate --migrationPath=@vendor/cakebake/yii2-actionlog/migrations

For more informations see [Database Migration Documentation](http://www.yiiframework.com/doc-2.0/guide-console-migrate.html#applying-migrations)

To access the module, you need to add this to your application configuration:

    ......
    'modules' => [
        'actionlog' => [
            'class' => 'cakebake\actionlog\Module',
        ],
    ],
    ......