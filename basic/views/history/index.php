<?php

use app\models\History;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'История';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                [ 
                    'attribute' => 'id_prod', 
                    'value' => function ($model) { 
                        return $model->prod->name_prod; 
                    }, 'label' => 'Продукты'
                ],
                [ 
                    'attribute' => 'id_meal', 
                    'value' => function ($model) { 
                        return $model->meal->name_meal; 
                    }, 
                    'label' => 'Прием пищи'
                ],
            ['attribute' => 'weight','label' => 'Вес'],
            ['attribute' => 'kkal','label' => 'Ккал'], 
    
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, History $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>










    


</div>
