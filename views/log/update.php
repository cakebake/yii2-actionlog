<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var cakebake\actionlog\model\ActionLog $model
 */

$this->title = Yii::t('actionlog', 'Update {modelClass}: ', [
  'modelClass' => 'Action Log',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('actionlog', 'Action Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('actionlog', 'Update');
?>
<div class="action-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
