<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 9:59
 */

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\Cat;
use app\models\PostForm;
use Yii;

class PostController extends BaseController
{
    /**
     * 上传头像和富文本编辑器
     * @return array
     */
    public function actions()
    {
        return [
//            上传图片
            'upload'=>[
                'class' => 'widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/web/images/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],

            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/web/images/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }

    /**
     * @return string
     * 文章列表
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 创建文章
     */
    public function actionCreate()
    {
        $model = new PostForm();
//        创建场景
        $model->setScenario(PostForm::SCENARIO_CREATE);
//        获取所有分类
        $cat = Cat::getAllCats();
        return $this->render('createPost',['model' => $model, 'cat' => $cat]);

    }
}