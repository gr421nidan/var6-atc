<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tel".
 *
 * @property int $id
 * @property string $tel
 * @property string $username
 *
 * @property User $username0
 */
class Tel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tel'], 'required'],
            [['tel'], 'string', 'max' => 11],
            [['username'], 'string', 'max' => 20],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Номер телефона',
            'username' => 'Абонент',
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
