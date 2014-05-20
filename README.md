Yii2 Action Log
===============
Automatically logs user actions like create, update, delete.
In addition, you can manually apply the method ```ActionLog::add('Save sample message')```, where you will need.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

    php composer.phar require --prefer-dist cakebake/yii2-actionlog "dev-master"

or add

    "cakebake/yii2-actionlog": "dev-master"

to the require section of your `composer.json` file.

Database Migration
------------

Check your database settings and run migration from your console:

    php yii migrate --migrationPath=@vendor/cakebake/yii2-actionlog/migrations

For more informations see [Database Migration Documentation](http://www.yiiframework.com/doc-2.0/guide-console-migrate.html#applying-migrations)

Configuration
------------

To access the module, you need to add this to your application configuration:

    ......
    'modules' => [
        'actionlog' => [
            'class' => 'cakebake\actionlog\Module',
        ],
    ],
    ......

Add the new menu item to your navbar:

    ......
    ['label' => 'Log', 'url' => ['/actionlog/log/index']],
    ......

You may have to customize the user rights for the access log view. You could do it by editing ```controllers/LogController.php```.

Example manual usage
------------

This is an example in the login method from the module cakebake/yii2-accounts.

    use cakebake\actionlog\model\ActionLog;

    ......
    public function login()
    {
        $user = $this->getUser();
        if ($this->validate()) {
            ActionLog::add('success', $user->id); //log message for success

            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            ActionLog::add('error', $user->id); //log message for error

            return false;
        }
    }
    ......
