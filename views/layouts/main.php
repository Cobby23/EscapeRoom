<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\components\GhostNav;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
  <?php
  NavBar::begin([
      'brandLabel' => Yii::$app->name,
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
          'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
      ],
  ]);
  
  echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'encodeLabels' => false,
    'items' => 
      User::getCurrentUser() === NULL ? 
      [
        ['label'=>'Login', 'url'=>['/user-management/auth/login']],
      ]
    :
      [
        ['label'=>'Rooms', 'url'=>['/room/index']],
        ['label'=>'Contact Us', 'url'=>['/site/contact']],
        (Yii::$app->user->identity->superadmin) ?
        [
          'label' => 'Backend routes',
          'items' => UserManagementModule::menuItems()
        ] : '',
        (Yii::$app->user->identity->superadmin) ?
        [
          'label' => 'Frontend routes',
          'items'=>[
            User::getCurrentUser() === NULL ? ['label'=>'Login', 'url'=>['/user-management/auth/login']] : ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
            ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
            ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
            ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
            ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
          ],
        ] : '',
        User::getCurrentUser() === NULL ? ['label'=>'Login', 'url'=>['/user-management/auth/login']] : ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
      ],
    
  ]);
  NavBar::end();
  ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
