<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $assignee_id
 * @property int $commision_id
 *
 * @property User $assignee
 * @property Commision $commision
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assignee_id', 'commision_id'], 'required'],
            [['assignee_id', 'commision_id'], 'integer'],
            [['assignee_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['assignee_id' => 'id']],
            [['commision_id'], 'exist', 'skipOnError' => true, 'targetClass' => Commision::class, 'targetAttribute' => ['commision_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assignee_id' => 'Assignee ID',
            'commision_id' => 'Commision ID',
        ];
    }

    /**
     * Gets query for [[Assignee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignee()
    {
        return $this->hasOne(User::class, ['id' => 'assignee_id']);
    }

    /**
     * Gets query for [[Commision]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommision()
    {
        return $this->hasOne(Commision::class, ['id' => 'commision_id']);
    }
}
