<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "priority".
 *
 * @property int $id
 * @property string $priority_name
 *
 * @property Commision[] $commisions
 */
class Priority extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'priority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority_name'], 'required'],
            [['priority_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'priority_name' => 'Priority Name',
        ];
    }

    /**
     * Gets query for [[Commisions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommisions()
    {
        return $this->hasMany(Commision::class, ['priority' => 'id']);
    }
}
