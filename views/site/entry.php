<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;//小部件ActivaForm用来生成HTML表单
?>
<?php $form = ActiveForm::begin(); //渲染表单的开始标签?>
    <?php echo $form->field($model, 'name') //创建"name"输入框?>
    <?php echo $form->field($model, 'email') //创建"email"输入框?>
<!--    --><?php //echo \Yii::$app->view->renderFile('@app/views/site/index.php'); //在任何地方都可以通过表达式 Yii::$app->view 访问 view 应用组件，调用此方法渲染视图?>
<!--    --><?php //echo $this->render('index'); //该代码会渲染该视图所在目录下的 _overview.php 视图文件，记住视图中 $this 对应 view 组件?>
    <div class="form-group">
        <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); //渲染表单的关闭菜单?>

