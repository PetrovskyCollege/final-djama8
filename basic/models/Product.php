<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name_prod
 * @property int $kkal_100gr
 *
 * @property History[] $histories
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_prod', 'kkal_100gr'], 'required'],
            [['kkal_100gr'], 'integer'],
            [['name_prod'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_prod' => 'Name Prod',
            'kkal_100gr' => 'Kkal 100gr',
        ];
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::class, ['id_prod' => 'id']);
    }
}
