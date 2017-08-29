<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 15:41
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\di\Container;
use yii\di\ServiceLocator;

class DependencyInjectController extends Controller
{
    public function actionIndex()
    {
        $sl = new ServiceLocator;
        Yii::$container->set('app\controllers\Driver', 'app\controllers\ManDriver');
        $sl->set('car', [
            'class' => 'app\controllers\Car',
        ]);
        $car = $sl->get('car');
        $car->run();
//        $container = new Container;
//
////        ManDriver 实例化 Driver
////        $driver = new ManDriver
//        $container->set('app\controllers\Driver', 'app\controllers\ManDriver');
//
////        $car = new Car($driver)
//        $car = $container->get('app\controllers\Car');
//        $car->run();
    }
}

interface Driver
{
    public function drive();
}

class ManDriver implements Driver
{
    public function drive()
    {
        // TODO: Implement drive() method.
        echo 'I am an old man';
    }
}

class Car
{
    private $driver = null;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    public function run()
    {
        $this->driver->drive();
    }
}