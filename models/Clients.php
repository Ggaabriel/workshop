<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $client_name
 * @property string $client_email
 *
 * @property Commision[] $commisions
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_name', 'client_email'], 'required'],
            [['client_name', 'client_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'client_email' => 'Client Email',
        ];
    }

    /**
     * Gets query for [[Commisions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommisions()
    {
        return $this->hasMany(Commision::class, ['client' => 'id']);
    }
}
