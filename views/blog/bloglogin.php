<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 15:20
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

Pjax::begin(
    [

    ]
);
$form = ActiveForm::begin([
    'id' => 'blog-login-form',
    'options' => [
        'class' => 'form-horizontal',
        'data' => ['pjax' => true],
    ],
]) ?>
    <?php echo $form->field($model, 'usrname')->textInput()->hint('Please enter your name')->label('Name'); ?>
    <?php echo $form->field($model, 'password')->passwordInput(); ?>
    <?php echo $form->field($model, 'email')->input('email'); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?php echo Html::submitButton('login', ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
<?php Pjax::end(); ?>

