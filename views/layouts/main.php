<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> About', 'url' => ['/site/about']],
            [
            'label' => '<span class="glyphicon glyphicon-earphone"></span> Our Service',
            'items' => [
                 ['label' => '<span class="glyphicon glyphicon-send"></span> IHUB Request', 'url' => ['/erform/index']],
                 ['label' => '<span class="glyphicon glyphicon-envelope"></span> Contact Us', 'url' => ['/site/contact']],
                ],
            ],
        // ['label' => '<span class="glyphicon glyphicon-map-marker"></span> Presensi', 'url' => ['/ihub-absence/index'], 'template'=> '<a href="{url}" target="_blank">{label}</a>'],
    ];

    if (Yii::$app->user->isGuest){
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-off"></span> Login', 'url' => ['/site/login']];
        } elseif (Yii::$app->user->identity->SPV == '1') {
             $menuItems[] = [
                 'label' => '<span class="glyphicon glyphicon-check"></span> Absence', 
                 'items' => [
                     ['label' => '<span class="glyphicon glyphicon-ok"></span> Online Absence', 'url' => ['/absence/ihub-absence/checkin']],
                     ['label' => '<span class="glyphicon glyphicon-file"></span> Report', 'url' => ['/absence/ihub-absence/index']]
                     ]];
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-briefcase"></span> iOffice',
                'items' => [
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">HR Department</li>',
                    ['label' => '[FORM] DATA IHUB', 'url' => '#'],
                    ['label' => '[FORM] FAST TRACK IHUB', 'url' => '#'],
                    ['label' => '[FORM] SCHEDULE', 'url' => ['/tbl-schedule/index']],
                    ['label' => '[FORM] BOOKING ROOM', 'url' => ['/site/bookroom']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">EVENT Department</li>',
                    ['label' => '[REPORT FORM] ICLICK', 'url' => ['/iwreport/index']],
                    ['label' => '[REPORT FORM] IREG', 'url' => '#'],
                    ['label' => '[REQUEST FORM] Inventory', 'url' => ['/item-stock/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">System Department</li>',
                    ['label' => '[IBADAH] Create', 'url' => ['/ihub-ibadah/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Creative Department</li>',
                    ['label' => '[FORM] Iconnect Cert', 'url' => ['/iconnect/index']],
                ],
            ];
            $menuItems[] = [
                'label' => Yii::$app->user->identity->Nama, 'url',
                'items' => [
                    '<li class="dropdown-header"></li>',
                    ['label' => '<span class="glyphicon glyphicon-user"></span> Profile', 'url' => ['/data-members/view1']],
                    ['label' => '<span class="glyphicon glyphicon-off"></span> Logout', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],     
            ];
        } else {
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-check"></span> Presensi', 'url' => ['/absence/ihub-absence/checkin']];
            $menuItems[] = [
                'label' => Yii::$app->user->identity->Nama, 'url',
                'items' => [
                    '<li class="dropdown-header"></li>',
                    ['label' => '<span class="glyphicon glyphicon-user"></span> Profile', 'url' => ['/data-members/view1']],
                    ['label' => '<span class="glyphicon glyphicon-off"></span> Logout', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],     
            ];
        }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; IHUB <?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
