<?php

namespace cakebake\actionlog\model;

use Yii;

/**
 * This is the model class for table "app_actionlog".
 *
 * @property string $id
 * @property string $user_id
 * @property string $user_remote
 * @property string $time
 * @property string $action
 * @property string $category
 * @property string $message
 */
class ActionLog extends \yii\db\ActiveRecord
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
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['user_remote', 'time', 'action', 'category', 'message'], 'required'],
            [['time'], 'safe'],
            [['message'], 'string'],
            [['user_remote', 'action', 'category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('actionlog', 'ID'),
            'user_id' => Yii::t('actionlog', 'User ID'),
            'user_remote' => Yii::t('actionlog', 'User Remote'),
            'time' => Yii::t('actionlog', 'Time'),
            'action' => Yii::t('actionlog', 'Action'),
            'category' => Yii::t('actionlog', 'Category'),
            'message' => Yii::t('actionlog', 'Message'),
        ];
    }
}
