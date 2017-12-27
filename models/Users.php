<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $status
 * @property string $created_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['username', 'status'], 'string', 'max' => 20],
            [['name', 'lastname', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
