<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Meal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="meal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_meal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eat_time')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
