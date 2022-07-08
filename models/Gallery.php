<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "galleries".
 *
 * @property int $id
 * @property int $room_id
 *
 * @property Image[] $images
 * @property Room $room
 */
class Gallery extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'galleries';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['room_id'], 'required'],
      [['room_id'], 'integer'],
      [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
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
    ];
  }

  /**
   * Gets query for [[Images]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getImages()
  {
    return $this->hasMany(Image::className(), ['gallery_id' => 'id']);
  }

  public function getImagePaths()
  {
    $paths = array();
    $images = $this->getImages()->all();
    foreach ($images as $image) {
      array_push($paths, Url::base() . '/images/' . $image->path);
    }
    return $paths;
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
}
