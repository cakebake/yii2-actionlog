<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\VarDumper;

/**
 * @var yii\web\View $this
 * @var cakebake\actionlog\model\ActionLog $model
 */

$this->title = Yii::t('actionlog', 'Action Log') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('actionlog', 'Action Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-log-view">

    <h1><?= Html::encode($this->title) ?> <small><?= Html::encode($model->category) ?>/<?= Html::encode($model->action) ?></small></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time',
            'category',
            'action',
            'user_id',
            'user_remote',
            'status',
            [
                'attribute' => 'message',
                'visible' => ($model->message === null) ? true : false,
            ],
        ],
    ]) ?>

    <?php if ($model->message !== null) : ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('actionlog', 'Message') ?></h3>
            </div>
            <div class="panel-body">
                <?php VarDumper::dump(@unserialize($model->message), 10, true) ?>
            </div>
            <ul class="list-group">
                <li class="list-group-item text-muted"><?= Html::encode($model->message) ?></li>
            </ul>
        </div>
    <?php endif; ?>

</div>
