<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var cakebake\actionlog\model\ActionLog $model
 */

$this->title = Yii::t('actionlog', 'Create {modelClass}', [
  'modelClass' => 'Action Log',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('actionlog', 'Action Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
