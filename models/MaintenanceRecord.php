<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenance_record".
 *
 * @property int $id
 * @property int $schedule_id
 * @property string|null $description
 * @property float|null $cost
 * @property string|null $performed_by
 * @property string $created_at
 *
 * @property MaintenanceSchedule $schedule
 */
class MaintenanceRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id'], 'required'],
            [['schedule_id'], 'integer'],
            [['description'], 'string'],
            [['cost'], 'number'],
            [['created_at'], 'safe'],
            [['performed_by'], 'string', 'max' => 255],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaintenanceSchedule::class, 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Schedule ID',
            'description' => 'Description',
            'cost' => 'Cost',
            'performed_by' => 'Performed By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Schedule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(MaintenanceSchedule::class, ['id' => 'schedule_id']);
    }
}
