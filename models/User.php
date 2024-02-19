<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property int $role_id
 *
 * @property Roles $role
 * @property Task[] $tasks
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $password_repeat;

    public $rules;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function beforeSave($insert)
{
    if (!parent::beforeSave($insert)) {
        return false;
    }

    if ($this->isNewRecord && $this->role_id === null) {
        // Устанавливаем значение по умолчанию, если не передано
        $this->role_id = null; // Замените на актуальное значение
    }
    return true;
}
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id'], 'default', 'skipOnEmpty' => true, 'value' => null],
            [['name', 'username', 'password'], 'required'],
            [['username', 'password'], 'match', 'pattern' => '/^[a-zA-Z0-9 -]*$/i', 'message' => 'Разрешены только латиница, пробел или тире!'],
            [['role_id'], 'integer'],
            [['name', 'username', 'password'], 'string', 'max' => 100],
            ['name', 'match', 'pattern' => '/^[а-яёА-ЯЁ -]*$/u', 'message' => 'Разрешены только кириллица, пробел или тире!'],
            [['password'],'string', 'min'=> 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['rules', 'compare', 'compareValue' => 1 , 'message' => "Вы соглашаетесь с правилами регистрации"],
            [['username'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['role_id' => 'id']],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'password_repeat' => 'password_repeat',
            'role_id' => 'Role ID',
            'rules'=> 'rules'
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['assignee_id' => 'id']);
    }
}
