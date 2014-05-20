<?php

namespace cakebake\actionlog\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use cakebake\actionlog\model\ActionLog;

/**
 * To use ActionLogBehavior, simply insert the following code to your ActiveRecord class:
 *
 * ```php
 * public function behaviors()
 * {
 *     return [
 *          'actionlog' => [
 *              'class' => 'cakebake\actionlog\behaviors\ActionLogBehavior',
 *          ],
 *     ];
 * }
 * ```
 */

class ActionLogBehavior extends Behavior
{
    /**
    * @var string The message of current action
    */
    public $message = null;

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
//            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }

    public function beforeInsert($event)
    {
        ActionLog::add($this->message !== null ? $this->message : __METHOD__, $this->owner->getPrimaryKey());
    }

    public function beforeUpdate($event)
    {
        ActionLog::add($this->message !== null ? $this->message : __METHOD__, $this->owner->getPrimaryKey());
    }

    public function beforeDelete($event)
    {
        ActionLog::add($this->message !== null ? $this->message : __METHOD__, $this->owner->getPrimaryKey());
    }

//    public function afterFind($event)
//    {
//        ActionLog::add($this->message !== null ? $this->message : __METHOD__, $this->owner->getPrimaryKey());
//    }
}
