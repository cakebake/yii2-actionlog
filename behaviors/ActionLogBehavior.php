<?php

namespace cakebake\actionlog\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * To use ActionLogBehavior, simply insert the following code to your ActiveRecord class:
 *
 * ```php
 * use cakebake\actionlog\behaviors\ActionLogBehavior;
 *
 * public function behaviors()
 * {
 *     return [
 *         ActionLogBehavior::className(),
 *     ];
 * }
 * ```
 */

class ActionLogBehavior extends AttributeBehavior
{
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

    public function afterFind($event)
    {
        DebugBreak();
    }
}
