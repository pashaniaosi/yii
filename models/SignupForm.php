<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 16:34
 */
namespace app\models;

use Codeception\Module\Db;
use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $mail;
    public $rePassword;
    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message' => '用户名不能为空'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],
//            ['username', 'match', 'pattern'=> '//', 'message' => '用户名不能以下划线、数字开头'],


            [['password', 'rePassword'], 'required','message' => '密码不能为空'],
            [['password', 'rePassword'], 'string', 'min' => 6],
            ['rePassword', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],

            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'rePassword' => '重复密码',
            'verifyCode' => '验证码',
        ];
    }

    public function signup()
    {

        if ($this->validate()) {
            $user = new User();
            $list = [
                'username' => $this->username,
                'password' => $this->password
            ];
            $user->setAttributes($list);

            if (!$user->save()) {
                throw new \Exception(current($user->getFirstErrors()));
            }
            return $user;
        }
        return null;
    }
}