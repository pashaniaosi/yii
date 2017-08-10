<?php
/*
 * 尝试声明一个控制器
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;
use yii\helpers\Url;
use yii\bootstrap\Alert;

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



    public function actionGetVersion()
    {
        return yii::getVersion();
    }

    public function actionCreateUrl()
    {
        echo Url::to(['site/index'], 'https');
    }

    public function actionInfo()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'message' => 'hello world',
            'code' => 100,
        ];
//        以下代码块和以上的代码作用一致
        /*return \Yii::createObject([
        'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
        'message' => 'hello world',
        'code' => 100,
    ],
        ]);*/
    }

    public function actionSession()
    {
        $session = Yii::$app->session;
//        开启session
        $session->open();
//        关闭session
//        $session->close();
//        销毁session中所有已注册的数据
//        $session->destroy();
        if ($session->isActive)
        {
            echo 'session开启<br>';
        }
//        session 组件会限制你直接修改数据中的单元项，所以以下代码不会生效
//        $session['captcha']['number'] = 5;
//        $session['captcha']['lifetime'] = 3600;
        $session['captcha'] = [
            'number' => 5,
            'lifetime' => 3600,
        ];

        echo $session['captcha']['lifetime'];
    }

    public function actionFlash()
    {
        $session = Yii::$app->session;

// 设置一个名为"postDeleted" flash 信息
        $session->setFlash('postDeleted', 'You have successfully deleted your post.');

// 显示名为"postDeleted" flash 信息
        echo $session->getFlash('postDeleted').'<br>';
// 使用 yii\bootstrap\Alert 小部件
        echo Alert::widget([
            'options' => ['class' => 'alert-info'],
            'body' => Yii::$app->session->getFlash('postDeleted'),
        ]);
    }

    public function actionDownload()
    {
        return \Yii::$app->response->sendFile(__DIR__.'/SiteController.php')->send();
    }

    public function actionEchoAlias()
    {
        Yii::setAlias('@rootpath', __DIR__.'/TestController.php');
        echo Yii::getAlias('@rootpath');
    }

    public function actionSql()
    {
//        使用Yii::$app->db来访问数据库连接
        $command = Yii::$app->db->createCommand('SELECT * FROM country where name = :name');
        $post1 = $command->bindValue(':name', 'China')->queryOne(); //防止SQL注入攻击

        print_r($post1);

        $count = Yii::$app->db->createCommand("SELECT [[name]] FROM {{country}}")
            ->queryScalar();
        echo $count;

    }

    public function actionEchoSql()
    {
        $command = (new \yii\db\Query())
            ->select(['code', 'name'])
            ->from('country')
            ->where(['>', 'population', '1000000'])
            ->limit(10)
            ->createCommand();

        $query = (new \yii\db\Query())
            ->from('country')
            ->limit(10)
            ->indexBy('code')
            ->all();

// 按索引排列数组
        print_r($query);

// 打印 SQL 语句
        echo $command->sql . '<br>';
// 打印被绑定的参数
        print_r($command->params);

// 返回查询结果的所有行
        $rows = $command->queryAll();

        print_r($rows);

        $sql = (new \yii\db\Query())
            ->from('country')
            ->indexBy('code');

        foreach ($sql->batch() as $users) {
            var_dump($users);
        }

        foreach ($sql -> each() as $user)
        {
            var_dump($user);
        }
    }

}