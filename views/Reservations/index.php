<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Reservations;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservations-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create Reservation', ['create'], ['class' => 'btn btn-success']) ?>
  </p>


  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      // 'id',
      [
        'attribute' => 'room_id',
        'value' => 'room.name'
      ],
      [
        'attribute' => 'user_id',
        'format' => 'raw',
        'value' => function ($model) {
          return Html::tag('p', $model->user->email ? $model->user->email : 'No Email Provided', ['class' => !$model->user->email ? 'font-weight-bold text-danger' : 'font-weight-bold text-primary']);
        },
      ],
      [
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
          if (User::hasRole('Admin') && $model->status === 'Pending') {
            return Html::a('Accept', ['reservations/accept/' . $model->id], ['class' => 'font-weight-bold text-success']) . ' / ' . Html::a('Decline', ['reservations/decline/' . $model->id], ['class' => 'font-weight-bold text-danger']);
          } else {
            $colorClass = '';
            switch ($model->status) {
              case 'Pending':
                $colorClass = "text-primary";
                break;
              case 'Accepted':
                $colorClass = "text-success";
                break;
              case 'Declined':
                $colorClass = "text-danger";
                break;
            }
            return Html::tag('p', $model->status, ['class' => 'font-weight-bold ' . $colorClass]);
          }
        },
      ],
      // 'status',
      [
        'attribute' => 'hour',
        'value' => 'hour'
      ],
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Reservations $model, $key, $index, $column) {
          return Url::toRoute([$action, 'id' => $model->id]);
        }
      ],
    ],
  ]); ?>


</div>