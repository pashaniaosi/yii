<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 10:00
 */
use app\widgets\post\postWidget;
use app\widgets\hot\hotWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\tag\tagWidget;
$this->title = "文章";
?>
<div class = "row">
    <div class="col-lg-9">
        <?php echo postWidget::widget([]); ?>
    </div>
    <div class="col-lg-3">
        <div class="panel">
            <?php if(!\Yii::$app->user->isGuest): ?>
                <a class="btn btn-success btn-block btn-post" href="<?php echo Url::to(['post/create']); ?>">创建文章</a>
            <?php endif;?>
        </div>
        <!-- 热门浏览 -->
        <?php echo hotWidget::widget(); ?>
        <!-- 标签云 -->
        <?php echo tagWidget::widget(); ?>
    </div>
</div>
