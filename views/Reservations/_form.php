<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Room;
use common\components\Modal;
use kartik\depdrop\DepDrop;
// use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Reservations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservations-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'room_id')->dropDownList(Room::getRoomsDropdownData(), [
    'prompt' => [
      'text' => Yii::t('app', 'Select Room...'),
      'options' => [
        // 'disabled' => true,
      ]
    ],
  ])
    ->label(Yii::t('app', 'Room')); ?>

  <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

  <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd',
  ]); ?>

  <?= $form->field($model, 'hour')->dropDownList(Room::getWorkingHours(), [
    'prompt' => [
      'text' => Yii::t('app', 'Select Hour...'),
      'options' => [
        // 'disabled' => true,
      ]
    ],
  ])
    ->label(Yii::t('app', 'Hour')); ?>

  <?= $form->field($model, 'status')->hiddenInput(['value' => 'Pending'])->label(false) ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>