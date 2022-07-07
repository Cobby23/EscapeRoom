<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property int $id
 * @property string $name
 * @property float|null $complexity
 * @property float $max_time
 * @property int|null $max_players
 */
class Room extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'rooms';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'max_time'], 'required'],
      [['complexity', 'max_time'], 'number'],
      [['max_players'], 'integer'],
      [['name'], 'string', 'max' => 255],
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
      'complexity' => 'Complexity',
      'max_time' => 'Max Time',
      'max_players' => 'Max Players',
    ];
  }

  public static function getRoomsDropdownData()
  {
    $rooms = Room::find()->all();

    $res = array();

    foreach ($rooms as $room) {
      $res[$room['id']] = $room->name;
    }

    return $res;
  }

  // public static function getRoomFreeHours($id, $date)
  // {
  //   $model = Room::find($id)->one();

  //   $reservations = Reservations::find()->where(['room_id' => $id])->andWhere(['date' => $date])->all();
  //   $avoid = array();

  //   $validHours = array();

  //   foreach ($reservations as $res) {
  //     for ($i = 0; $i < ceil($model['max_time']); $i++) {
  //       array_push($avoid, $res->hour + $i);
  //     }
  //   }
  //   for ($i = 9; $i < 18; $i++) {
  //     if (!in_array($i, $avoid)) {
  //       $validHours[$i] = $i . ':00';
  //     }
  //   }

  //   return $validHours;
  // }

  public static function getWorkingHours()
  {
    $validHours = array();
    for ($i = 9; $i < 18; $i++) {
      $validHours[$i] = $i . ':00';
    }

    return $validHours;
  }
}
