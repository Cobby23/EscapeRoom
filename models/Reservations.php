<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "reservations".
 *
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property string $start_time
 * @property string|null $status
 *
 * @property Rooms $room
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
      [['room_id', 'user_id', 'date', 'hour'], 'required'],
      [['room_id', 'user_id'], 'integer'],
      [['date'], 'safe'],
      [['hour'], 'number'],
      [['status'], 'string', 'max' => 255],
      [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'room_id' => 'Room',
      'user_id' => 'User',
      'date' => 'Date',
      'hour' => 'Hour',
      'status' => 'Status',
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
   * Gets query for [[User]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }
}
