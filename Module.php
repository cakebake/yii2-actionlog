<?php

namespace cakebake\actionlog;

use Yii;

class Module extends \yii\base\Module
{
    /**
    * @inheritdoc
    */
    public $defaultRoute = 'log';

    /**
     * @var boolean whether to activate log for the index action.
     */
    public $logindex = false;

    /**
     * @var boolean whether to activate log for the create action.
     */
    public $logcreate = true;

    /**
     * @var boolean whether to activate log for the update action.
     */
    public $logupdate = true;

    /**
     * @var boolean whether to activate log for the delete action.
     */
    public $logdelete = true;

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        Yii::setAlias('@actionlog', $this->getBasePath());
        $this->registerTranslations();
    }

    /**
    * Translating module messages
    */
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['actionlog'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@actionlog/messages',
            'sourceLanguage' => 'en-US',
        ];
    }
}
