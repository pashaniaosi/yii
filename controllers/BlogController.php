<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 15:11
 */
namespace app\controllers;
use yii\web\Controller;
use app\models\BlogLoginForm;

class BlogController extends Controller
{
    function actionLogin()
    {
        $model = new BlogLoginForm();
        return $this->render('blog');
    }
}