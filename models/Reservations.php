<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservations".
 *
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property string $start_time
 * @property int $status_id
 *
 * @property Rooms $room
 * @property Status $status
 * @property User $user
 */
class Reservations extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'reservations';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['room_id', 'user_id', 'start_time', 'status_id'], 'required'],
      [['room_id', 'user_id', 'status_id'], 'integer'],
      [['start_time'], 'safe'],
      [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
      [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'room_id' => 'Room ID',
      'user_id' => 'User ID',
      'start_time' => 'Start Time',
      'status_id' => 'Status ID',
    ];
  }

  /**
   * Gets query for [[Room]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getRoom()
  {
    return $this->hasOne(Room::className(), ['id' => 'room_id']);
  }

  /**
   * Gets query for [[Status]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getStatus()
  {
    return $this->hasOne(Status::className(), ['id' => 'status_id']);
  }

  /**
   * Gets query for [[User]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }
}
