<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $nama
 * @property string $email
 * @property string $password
 * @property string $level_user
 */
class User extends \yii\db\ActiveRecord
{
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
            [['username', 'nama', 'email', 'password', 'level_user'], 'required'],
            [['username', 'nama', 'email', 'password', 'level_user'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'level_user' => 'Level User',
        ];
    }
}
