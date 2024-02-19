<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "malfunction".
 *
 * @property int $id
 * @property string $malfunction_name
 * @property string $time_to_repair
 * @property string $break_reason
 * @property string $actions_taken
 * @property int $cost
 *
 * @property Commision[] $commisions
 * @property ComponentsForMalfunction[] $componentsForMalfunctions
 */
class Malfunction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'malfunction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['malfunction_name', 'time_to_repair', 'break_reason', 'actions_taken', 'cost'], 'required'],
            [['time_to_repair'], 'safe'],
            [['cost'], 'integer'],
            [['malfunction_name'], 'string', 'max' => 100],
            [['break_reason', 'actions_taken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'malfunction_name' => 'Malfunction Name',
            'time_to_repair' => 'Time To Repair',
            'break_reason' => 'Break Reason',
            'actions_taken' => 'Actions Taken',
            'cost' => 'Cost',
        ];
    }

    /**
     * Gets query for [[Commisions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommisions()
    {
        return $this->hasMany(Commision::class, ['malfunction' => 'id']);
    }

    /**
     * Gets query for [[ComponentsForMalfunctions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponentsForMalfunctions()
    {
        return $this->hasMany(ComponentsForMalfunction::class, ['malfunction' => 'id']);
    }
}
