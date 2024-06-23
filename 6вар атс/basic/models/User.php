<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $username
 * @property string $password
 * @property string $role
 *
 * @property Debt[] $debts
 * @property Tel[] $tels
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 20],
            [['password', 'role'], 'string', 'max' => 30],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'пароль',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debt::class, ['username' => 'username']);
    }

    /**
     * Gets query for [[Tels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTels()
    {
        return $this->hasMany(Tel::class, ['username' => 'username']);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
