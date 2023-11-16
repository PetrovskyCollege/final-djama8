<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int $id_prod
 * @property int $id_meal
 * @property int $weight
 * @property int $kkal
 *
 * @property Meal $meal
 * @property Product $prod
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prod', 'id_meal', 'weight', 'kkal'], 'required'],
            [['id_prod', 'id_meal', 'weight', 'kkal'], 'integer'],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_prod' => 'id']],
            [['id_meal'], 'exist', 'skipOnError' => true, 'targetClass' => Meal::class, 'targetAttribute' => ['id_meal' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_prod' => 'Id Prod',
            'id_meal' => 'Id Meal',
            'weight' => 'Weight',
            'kkal' => 'Kkal',
        ];
    }

    /**
     * Gets query for [[Meal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meal::class, ['id' => 'id_meal']);
    }

    /**
     * Gets query for [[Prod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Product::class, ['id' => 'id_prod']);
    }
    
}
