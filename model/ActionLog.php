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
 * @property string $status
 * @property string $message
 */
class ActionLog extends ActiveRecord
{
    const LOG_STATUS_SUCCESS = 'success';
    const LOG_STATUS_INFO = 'info';
    const LOG_STATUS_WARNING = 'warning';
    const LOG_STATUS_ERROR = 'error';

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
    * @param string $status The log status information
    * @param mixed $message The log message
    * @param int $uID The user id
    */
    public static function add($status = null, $message = null, $uID = 0)
    {
        $model = Yii::createObject(__CLASS__);
        $model->user_id = ((int)$uID !== 0) ? (int)$uID : (int)$model->getUserID();
        $model->user_remote = $_SERVER['REMOTE_ADDR'];
        $model->action = Yii::$app->requestedAction->id;
        $model->category = Yii::$app->requestedAction->controller->id;
        $model->status = $status;
        $model->message = ($message !== null) ? serialize($message) : null;

        return $model->save();
    }

    /**
    * Get the current user ID
    *
    * @return int The user ID
    */
    public static function getUserID()
    {
        $user = Yii::$app->getUser();

        return $user && !$user->getIsGuest() ? $user->getId() : 0;
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
            'status' => Yii::t('actionlog', 'Status'),
            'message' => Yii::t('actionlog', 'Message'),
        ];
    }
}
