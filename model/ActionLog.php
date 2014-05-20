<?php

namespace cakebake\actionlog\model;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "actionlog".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_remote
 * @property timestamp $time
 * @property string $action
 * @property string $category
 * @property string $message
 */
class ActionLog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%actionlog}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'time',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
    * Adds a message to ActionLog model
    *
    * @param mixed $message The log message
    */
    public static function add($message, $userID = null)
    {
        if ($userID === null) {
            $user = Yii::$app->getUser();
            $userID = ($user && !$user->isGuest) ? $user->id : 0;
        }

        $model = new ActionLog();
        $model->user_id = $userID;
        $model->user_remote = $_SERVER['REMOTE_ADDR'];
        $model->action = Yii::$app->requestedAction->id;
        $model->category = Yii::$app->requestedAction->controller->id;
        $model->message = serialize($message);

        return $model->save();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('actionlog', 'ID'),
            'user_id' => Yii::t('actionlog', 'User'),
            'user_remote' => Yii::t('actionlog', 'User Remote'),
            'time' => Yii::t('actionlog', 'Time'),
            'action' => Yii::t('actionlog', 'Action'),
            'category' => Yii::t('actionlog', 'Category'),
            'message' => Yii::t('actionlog', 'Message'),
        ];
    }
}
