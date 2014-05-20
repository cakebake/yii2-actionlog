<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var cakebake\actionlog\model\ActionLog $model
 */

$this->title = Yii::t('actionlog', 'Action Log') . ' ' . Yii::t('actionlog', 'ID') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('actionlog', 'Action Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'user_remote',
            'time',
            'action',
            'category',
            'message:ntext',
        ],
    ]) ?>

</div>
