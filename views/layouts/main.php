<?php

/* @var $this \yii\web\View */
/* @var $content string */

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
        'brandLabel' => '博客',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);*/
    $navLeft=[
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '关于', 'url' => ['/site/about']],
        ['label' => '联系', 'url' => ['/site/contact']]
    ];
    $navRight=[
//        ['label' => '首页', 'url' => ['/site/index']],
//        ['label' => '关于', 'url' => ['/site/about']],
//        ['label' => '联系', 'url' => ['/site/contact']]
    ];
    if (Yii::$app->user->isGuest) {
        array_push($navRight,['label' => '登入', 'url' => ['/site/login']],['label' => '注册', 'url' => ['/site/signup']]);
    } else {
        array_push($navRight,['label' => '<img src = "'.Yii::$app->params['avatar']['small'].'" class="avatar-img" alt="'. Yii::$app->user->identity->username.'"> ',

                'linkOptions' => ['class' => 'avatar'],
                'items' => [
                    ['label' => '退出', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ['label' => '个人中心'],
                ],
            ]



        );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $navLeft,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
//       不过滤代码标签
        'encodeLabels' => false,
        'items' => $navRight,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
