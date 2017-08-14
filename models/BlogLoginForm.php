<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 15:15
 */
namespace app\models;

use yii\base\Model;

class BlogLoginForm extends Model
{
    public $username;
    public $password;
    public function rules()
    {
        return [
//          规则待定
        ];
    }
}