<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;//小部件ActivaForm用来生成HTML表单
?>
<?php $form = ActiveForm::begin(); //渲染表单的开始标签?>
    <?php echo $form->field($model, 'name') //创建"name"输入框?>
    <?php echo $form->field($model, 'email') //创建"email"输入框?>
    <div class="form-group">
        <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); //渲染表单的关闭菜单?>

