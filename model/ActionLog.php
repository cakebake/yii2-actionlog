<?php

namespace cakebake\actionlog\model;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
            'timestamp' => [
                'class' => 'yii\behaviors\BlameableBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_INSERT => 'user_id',
                    ActiveRecord::EVENT_AFTER_UPDATE => 'user_id',
                    ActiveRecord::EVENT_AFTER_DELETE => 'user_id',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
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
