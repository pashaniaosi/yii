<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 9:59
 */
// 创建一个模块中的控制器
namespace app\modules\forum\controllers;

use app\modules\forum\Module;
use yii\web\Controller;

class PostController extends Controller
{
    //模块中创建一个控制器和在应用中创建一个控制器是类似的

    // 访问模块的信息
    public function actionModule()
    {
//        返回 forum 模块类的实例
        $module = Module::getInstance();

//        获取ID为 "forum" 的模块
//        $module = \Yii::$app->getModule('forum');

//        获取处理当前请求控制器所属的模块
//        $module = \Yii::$app->controller->module;

//        访问 forum 模块类的ID
        echo $module -> id;
    }
}