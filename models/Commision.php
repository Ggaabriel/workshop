<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commision".
 *
 * @property int $id
 * @property int $priority
 * @property string $date
 * @property string $gadget_name
 * @property int $malfunction
 * @property string $gadget_info
 * @property int $client
 * @property int $status
 * @property string $date_complete
 * @property string $date_add
 * @property string $comments
 * @property string $description
 *
 * @property Clients $client0
 * @property Malfunction $malfunction0
 * @property Priority $priority0
 * @property Status $status0
 * @property Task[] $tasks
 */
class Commision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority', 'date', 'gadget_name', 'malfunction', 'gadget_info', 'client', 'status', 'date_complete', 'date_add', 'comments', 'description'], 'required'],
            [['priority', 'malfunction', 'client', 'status'], 'integer'],
            [['date', 'date_complete', 'date_add'], 'safe'],
            [['gadget_name', 'gadget_info'], 'string', 'max' => 100],
            [['comments', 'description'], 'string', 'max' => 255],
            [['client'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client' => 'id']],
            [['malfunction'], 'exist', 'skipOnError' => true, 'targetClass' => Malfunction::class, 'targetAttribute' => ['malfunction' => 'id']],
            [['priority'], 'exist', 'skipOnError' => true, 'targetClass' => Priority::class, 'targetAttribute' => ['priority' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'priority' => 'Priority',
            'date' => 'Date',
            'gadget_name' => 'Gadget Name',
            'malfunction' => 'Malfunction',
            'gadget_info' => 'Gadget Info',
            'client' => 'Client',
            'status' => 'Status',
            'date_complete' => 'Date Complete',
            'date_add' => 'Date Add',
            'comments' => 'Comments',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Client0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient0()
    {
        return $this->hasOne(Clients::class, ['id' => 'client']);
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

    /**
     * Gets query for [[Priority0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriority0()
    {
        return $this->hasOne(Priority::class, ['id' => 'priority']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::class, ['id' => 'status']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['commision_id' => 'id']);
    }
}
