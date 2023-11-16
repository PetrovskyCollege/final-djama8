<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meal".
 *
 * @property int $id
 * @property string $name_meal
 * @property string $eat_time
 * @property int $id_user
 *
 * @property History[] $histories
 * @property User $user
 */
class Meal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_meal', 'eat_time', 'id_user'], 'required'],
            [['eat_time'], 'safe'],
            [['id_user'], 'integer'],
            [['name_meal'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_meal' => 'Name Meal',
            'eat_time' => 'Eat Time',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::class, ['id_meal' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
