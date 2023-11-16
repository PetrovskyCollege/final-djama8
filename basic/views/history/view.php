<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\History $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [


            [ 
                'attribute' => 'id_prod', 
                'value' => function ($model) { 
                    return $model->prod->name_prod; 
                }, 
            ],
            [ 
                'attribute' => 'id_meal', 
                'value' => function ($model) { 
                    return $model->meal->name_meal; 
                }, 
            ],

            'weight',
            'kkal',
        ],
    ]) ?>

</div>
