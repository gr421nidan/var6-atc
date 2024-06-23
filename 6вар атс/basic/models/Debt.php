<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debt".
 *
 * @property int $id
 * @property string $username
 * @property string $type
 * @property float $price
 *
 * @property User $username0
 */
class Debt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'type', 'price'], 'required'],
            [['price'], 'number'],
            [['username'], 'string', 'max' => 20],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['username' => 'username']],
            [['type'], 'in', 'range' => ['абонентская', 'повременная']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Абонент',
            'type' => 'Тип задолжности',
            'price' => 'Цена задолжности',
        ];
    }

    /**
     * Gets query for [[Username0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(User::class, ['username' => 'username']);
    }
}
