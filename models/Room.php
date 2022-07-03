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
}
