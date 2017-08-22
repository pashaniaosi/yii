<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写以下的内容完成注册:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?php echo $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => '请输入用户名',
                    ]
                ]); ?>

                <?php echo $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => '请输入密码',
                    ]
                ])->passwordInput(); ?>

                <?php echo $form->field($model, 'rePassword', [
                        'inputOptions' => [
                                'placeholder' => '请再次输入密码',
                        ]
                ])->passwordInput(); ?>

                <?php echo $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className()); ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
