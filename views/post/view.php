<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/18
 * Time: 9:59
 */

$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章'), 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-9">

        <div class="page-title">
            <h1><?php echo $data['title']; ?></h1>
            <span>作者: <?php echo $data['user_name']; ?></span>
            <span>发布: <?php echo date('Y-m-d', $data['created_at']); ?></span>
            <span>浏览: <?php echo isset($data['extend']['browser'])?$data['extend']['browser']:0; ?></span>
        </div>

        <div class="page-content">
            <?= $data['content']?>
        </div>


        <div class="page-tag">
            标签:
            <?php foreach ($data['tags'] as $tags): ?>
                <span><a href="#"><?php echo $tags?></a> </span>
            <?php endforeach;?>
        </div>

    </div>


    <div class="col-lg-3">

    </div>
</div>
