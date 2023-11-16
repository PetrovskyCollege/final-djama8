<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\History $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prod')->dropDownList(
        [
            (\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id','name_prod'))
           
            
     ])?>

    <?= $form->field($model, 'id_meal')->dropDownList(
       [
        (\yii\helpers\ArrayHelper::map(\app\models\Meal::find()->all(), 'id','name_meal'))
       
        
 ])?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'kkal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
