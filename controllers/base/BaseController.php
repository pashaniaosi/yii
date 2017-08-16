<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 10:03
 */
namespace app\controllers\base;

use yii\web\Controller;

/**
 * Class BaseController
 * @package app\controllers\base
 * 基础控制器
 */

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
        {
            return false;
        }
        return true;
    }
}