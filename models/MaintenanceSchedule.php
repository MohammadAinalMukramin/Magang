<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenance_schedule".
 *
 * @property int $id
 * @property int $ship_id
 * @property string $schedule_date
 * @property string|null $status
 * @property string $created_at
 *
 * @property MaintenanceRecord[] $maintenanceRecords
 * @property Ship $ship
 */
class MaintenanceSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ship_id', 'schedule_date'], 'required'],
            [['ship_id'], 'integer'],
            [['schedule_date', 'created_at'], 'safe'],
            [['status'], 'string'],
            [['ship_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ship::class, 'targetAttribute' => ['ship_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ship_id' => 'Ship ID',
            'schedule_date' => 'Schedule Date',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[MaintenanceRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenanceRecords()
    {
        return $this->hasMany(MaintenanceRecord::class, ['schedule_id' => 'id']);
    }

    /**
     * Gets query for [[Ship]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShip()
    {
        return $this->hasOne(Ship::class, ['id' => 'ship_id']);
    }
}
