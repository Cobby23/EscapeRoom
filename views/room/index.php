<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;
use app\models\Room;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?php if (User::hasRole('Admin')) {
      echo Html::a('Create Room', ['create'], ['class' => 'btn btn-success']);
    } ?>
  </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); 
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      // 'id',
      'name',
      [
        'attribute' => 'complexity',
        // 'value' => function ($model) {
        //   echo StarRating::widget([
        //     'name' => '',
        //     'value' => $model->complexity,
        //     // 'clientOptions' => [
        //     //   'disabled' => true
        //     // ],
        //   ]);
        // }
        'value' => 'complexity',
      ],
      'max_time',
      'max_players',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Room $model, $key, $index, $column) {
          return Url::toRoute([$action, 'id' => $model->id]);
        }
      ],
    ],
  ]); ?>


</div>