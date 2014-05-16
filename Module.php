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
