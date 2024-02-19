<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "components_for_malfunction".
 *
 * @property int $id
 * @property int $component
 * @property int $malfunction
 *
 * @property Components $component0
 * @property Malfunction $malfunction0
 */
class ComponentsForMalfunction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'components_for_malfunction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['component', 'malfunction'], 'required'],
            [['component', 'malfunction'], 'integer'],
            [['component'], 'exist', 'skipOnError' => true, 'targetClass' => Components::class, 'targetAttribute' => ['component' => 'id']],
            [['malfunction'], 'exist', 'skipOnError' => true, 'targetClass' => Malfunction::class, 'targetAttribute' => ['malfunction' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'component' => 'Component',
            'malfunction' => 'Malfunction',
        ];
    }

    /**
     * Gets query for [[Component0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponent0()
    {
        return $this->hasOne(Components::class, ['id' => 'component']);
    }

    /**
     * Gets query for [[Malfunction0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMalfunction0()
    {
        return $this->hasOne(Malfunction::class, ['id' => 'malfunction']);
    }
}
