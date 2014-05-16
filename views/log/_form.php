<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var cakebake\actionlog\model\ActionLog $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="action-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'user_remote')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('actionlog', 'Create') : Yii::t('actionlog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
