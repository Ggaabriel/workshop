<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "components".
 *
 * @property int $id
 * @property string $components_name
 * @property int $components_price
 *
 * @property ComponentsForMalfunction[] $componentsForMalfunctions
 */
class Components extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'components';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['components_name', 'components_price'], 'required'],
            [['components_price'], 'integer'],
            [['components_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'components_name' => 'Components Name',
            'components_price' => 'Components Price',
        ];
    }

    /**
     * Gets query for [[ComponentsForMalfunctions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponentsForMalfunctions()
    {
        return $this->hasMany(ComponentsForMalfunction::class, ['component' => 'id']);
    }
}
