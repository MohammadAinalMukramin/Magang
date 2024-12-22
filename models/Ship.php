<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ship".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $owner
 * @property string|null $status
 * @property string $created_at
 *
 * @property MaintenanceSchedule[] $maintenanceSchedules
 */
class Ship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'owner'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 100],
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
            'type' => 'Type',
            'owner' => 'Owner',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[MaintenanceSchedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenanceSchedules()
    {
        return $this->hasMany(MaintenanceSchedule::class, ['ship_id' => 'id']);
    }
}
