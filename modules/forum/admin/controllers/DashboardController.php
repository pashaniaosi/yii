<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 10:47
 */
//测试模块嵌套
namespace app\modules\forum\admin\controllers;

//use app\modules\forum\admin\Module;
use yii\web\Controller;

class DashboardController extends Controller
{
    public function actionIndex()
    {
        $module = \Yii::$app->controller->module;
        echo '这是一个模块嵌套，'.'模块 ID 为'.$module->id;
    }
}
