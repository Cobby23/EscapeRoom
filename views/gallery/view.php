<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gallery-view">

  <h1><?= Html::encode($model->room->name . ' gallery') ?></h1>
  <p>
    <?php if (User::hasRole('Admin')) echo Html::a('Add Image', ['site/upload', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
  </p>

  <?php
  if (count($model->getImagePaths()) !== 0) {
    foreach ($model->getImagePaths() as $image) {
      echo Html::beginTag('div', ['class' => 'w-70 p-3 mb-4 d-flex justify-content-center relative mx-auto', 'style' => 'height:700px;']);
      echo Html::img($image, ['alt' => 'some', 'class' => 'w-100']);
      echo Html::endTag('div');
    }
  }
  ?>



</div>