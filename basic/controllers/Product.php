<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;

class ProductController extends Controller
{

    public function actionIndex(){
        $product = Product::find()->all();
        return $this->render('index', compact('products'));
    }

}