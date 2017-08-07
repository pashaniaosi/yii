<?php
use yii\helpers\Html;
use yii\web\View;
use app\components\HelloWidget;
?>
<?php
    echo Html::encode($message).'<br>';
//    使用 widget
    echo HelloWidget::widget(['message' => 'Good morning']);
?>
<?php //echo $this->context->id; //表达式$this->context可获取到控制器ID， 可让你在该视图中获取控制器的任意属性或方法
                                 //$this->context->id 可以获取控制器ID?>
<?php
    \Yii::$app->view->on(View::EVENT_END_BODY, function ()
    {
        echo date('Y-m-d');
    });
?>

