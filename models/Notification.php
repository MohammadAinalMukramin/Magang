<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property int $pegawai_id
 * @property string $email
 * @property string $message
 * @property string|null $status
 * @property string $created_at
 *
 * @property Pegawai $pegawai
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'email', 'message'], 'required'],
            [['pegawai_id'], 'integer'],
            [['message', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['pegawai_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pegawai_id' => 'Pegawai ID',
            'email' => 'Email',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, ['id' => 'pegawai_id']);
    }
}
