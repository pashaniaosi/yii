<?php
/*
 * 尝试声明一个控制器
 */
namespace app\controllers;

use yii\web\Controller;
use app\models\ContactForm;

class TestController extends Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        echo "hello!";
//        return $this->render('@app/views/site/index.php');
//        return \Yii::$app->view->renderFile('@app/views/site/index.php');
    }

    public function actionTest()
    {
        $model = new ContactForm();

        $model['name'] = 'example';
        echo $model['name'];


        foreach ($model as $name => $value) {
            echo "$name: $value<br>";
        }

        echo $model -> getAttributeLabel('name');
    }

    //输出model: ContactForm.php 的默认的报错
    public function actionValidate()
    {
        $model = new ContactForm();
        /*$data = \Yii::$app->request->post('ContactForm', []);
        $model->name = isset($data['name']) ? $data['name'] : null;
        $model->email = isset($data['email']) ? $data['email'] : null;
        $model->subject = isset($data['subject']) ? $data['subject'] : null;
        $model->body = isset($data['body']) ? $data['body'] : null;
        此段代码和下一行代码的作用相同，都是将 ContactForm 的属性赋空值*/
        $model->attributes = \Yii::$app->request->post('ContactForm');//块赋值
        /*
        //原代码
        if($model->validate()){

        } else {
            $error = $model->errors;
            foreach ($error as $key => $value){
                foreach ($value as $id => $string){
                    echo "$key: $string<br>";
                }
            }
        }*/
        //改进的代码
        if(!$model->validate()){
            print_r($model->getFirstErrors());
        }
    }

}
