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
     * @var boolean whether to activate log for the index action.
     */
    public $logIndex = false;

    /**
     * @var boolean whether to activate log for the create action.
     */
    public $logCreate = true;

    /**
     * @var boolean whether to activate log for the update action.
     */
    public $logUpdate = true;

    /**
     * @var boolean whether to activate log for the delete action.
     */
    public $logDelete = true;

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }

    public function beforeInsert($event)
    {
        if ($this->logCreate == true) {
            ActionLog::add(ActionLog::LOG_STATUS_INFO, $this->message !== null ? $this->message : __METHOD__);
        }
    }

    public function beforeUpdate($event)
    {
        if ($this->logUpdate == true) {
            ActionLog::add(ActionLog::LOG_STATUS_INFO, $this->message !== null ? $this->message : __METHOD__);
        }
    }

    public function beforeDelete($event)
    {
        if ($this->logDelete == true) {
            ActionLog::add(ActionLog::LOG_STATUS_INFO, $this->message !== null ? $this->message : __METHOD__);
        }
    }

    public function afterFind($event)
    {
        if ($this->logIndex == true) {
            ActionLog::add(ActionLog::LOG_STATUS_INFO, $this->message !== null ? $this->message : __METHOD__);
        }
    }
}
