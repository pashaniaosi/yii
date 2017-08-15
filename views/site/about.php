<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '关于';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        This is the About page. You may modify the following file to customize its content:-->
<!--    </p>-->
    <p>
        这是一个关于界面. 你可以修改以下文件去修改他的内容!
    </p>

    <code><?php echo __FILE__; ?></code>
</div>
